<?php

namespace App\Jobs\Appointment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\AppointmentAvailableSlot;
use Illuminate\Support\Str;
use Illuminate\Queue\Jobs\SyncJob;

class GenerateAppointmentAvailableSlots implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    
    /**
     * The user's calendar
     */
    protected $calendar;

    /**
     * How many weeks in advance do we need to make the calculation
     */
    protected $weeksNumber = 4;

    /**
     * A date range to calculate for
     */
    protected $range;

    /**
     * User working hours
     */
    protected $userWorkingHours;

    /**
     * The fixed point in time at which we make the calculations
     */
    protected $now;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        
        # Set the moment value
        $this->now = now();
        
        # Set the user's calendar
        $this->calendar = $user->calendars->first();
        
        # Set the range
        $this->range = [
            $this->now->toDateString(),
            $this->now->addWeeks($this->weeksNumber)->toDateString()
        ];

        # User working hours
        $this->userWorkingHours = $this->user->getWorkingHours();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        # Check if we need to continue
        if (! $this->isStillActual()) {
            return;
        }

        # Get all unavailable slots
        $unavailableSlots = $this->getUnavailableSlots();

        # Generate available slots
        $availableSlots = $this->generateAvailableSlots($unavailableSlots);

        # Drop all existing user's available slots
        $this->dropSlots();

        # Insert available slots
        $this->insert($availableSlots);
    }

    /**
     * Check if the job's execution is still actual. It is actual
     * if the user's appointments have changed before the job
     * has been created or if we are using the sync queue driver.
     * 
     * @return boolean
     */
    protected function isStillActual()
    {
        if (null === $this->user->appointmentsChangedAt()) {
            return true;
        }

        # Check if we are using the sync queue driver
        if ($this->job instanceof SyncJob) {
            return true;
        }

        return $this->job->getDatabaseJob()->created_at->gte($this->user->appointmentsChangedAt());
    }

    /**
     * Get all unavailable slots
     * 
     * @return array
     */
    protected function getUnavailableSlots()
    {
        /**
         * Let's merge all sets of unavailable slots,
         * assuming that the result will have overlapping periods
         */
        $overlappingUnavailableSlots = array_merge(
            $this->calendarEventsDurations(),
            $this->offHoursDurations(),
            $this->timeOffEntriesDurations(),
            $this->appointmentsDurations()
        );

        # Merge overlapping unavailable slots and return the results
        return $this->mergeOverlappingUnavailableSlots($overlappingUnavailableSlots);
    }

    /**
     * Sort given slots by start datetime
     * 
     * @param array $slots
     * @return array
     */
    protected function sortSlotsByStartDateTime(array $slots)
    {
        usort($slots, function ($first, $second) {
            if ($first->getStartDate()->eq($second->getStartDate())) {
                return 0;
            }

            return $first->getStartDate()->lt($second->getStartDate()) ? -1 : 1;
        });

        return $slots;
    }

    /**
     * Do the specified periods overlap or touch each other
     * 
     * @param CarbonPeriod $first
     * @param CarbonPeriod $second
     * @return boolean
     */
    protected function doPeriodsOverlapOrTouch(CarbonPeriod $first, CarbonPeriod $second)
    {
        # Check if periods overlap
        if ($first->overlaps($second)) {
            return true;
        }

        if ($first->getStartDate()->diffInSeconds($second->getEndDate()) <= 1) {
            return true;
        }

        if ($second->getStartDate()->diffInSeconds($first->getEndDate()) <= 1) {
            return true;
        }

        return false;
    }

    /**
     * Merge all kinds of unavailable slots and return an array
     * 
     * @param array $slots
     * @return array
     */
    protected function mergeOverlappingUnavailableSlots(array $unavailableSlots)
    {
        # Sort by a start datetime
        $unavailableSlots = $this->sortSlotsByStartDateTime($unavailableSlots);

        # Loop over slots
        foreach ($unavailableSlots as $key => $slot) {
            # Do nothing with the first slot
            if (0 === $key) {
                continue;
            }

            # Get the previous slot
            $prevSlot = $unavailableSlots[$key - 1];

            # Check if this slot does overlap the previous one
            if ($this->doPeriodsOverlapOrTouch($slot, $prevSlot)) {
                $start = $slot->getStartDate()->lte($prevSlot->getStartDate())
                    ? $slot->getStartDate()
                    : $prevSlot->getStartDate()
                ;
                
                $end = $slot->getEndDate()->gte($prevSlot->getEndDate())
                    ? $slot->getEndDate()
                    : $prevSlot->getEndDate()
                ;

                $unavailableSlots[$key] = CarbonPeriod::create($start, $end);
                
                # Unset the unneeded slot
                unset($unavailableSlots[$key - 1]);
            }
        }

        # Reset keys
        $unavailableSlots = array_values($unavailableSlots);

        return $unavailableSlots;
    }

    /**
     * Retrieve the user's calendar events durations for the given range
     * 
     * @return array
     */
    protected function calendarEventsDurations()
    {
        # Check if the user has synced their calendar
        if (null === $this->calendar) {
            return [];
        }

        # Get renderable events of the calendar
        $renderableEvents = $this->calendar->renderableEvents($this->range);

        # Check if the calendar has any events
        if ($renderableEvents->isEmpty()) {
            return [];
        }

        return $renderableEvents
            ->map(function($event) {
                return CarbonPeriod::create($event->start_at, $event->end_at);
            })
            ->toArray();
    }

    /**
     * Get off-hours durations
     * 
     * @return array
     */
    protected function offHoursDurations()
    {
        # Let's generate entries for the range
        $period = CarbonPeriod::create($this->range[0], $this->range[1]);

        # Iterate through the period
        foreach ($period as $date) {
            # Get the date's schedule
            $dateWorkingHours = $this->userWorkingHours[strtolower($date->format('D'))];

            # Do if it is a day off
            if (! $dateWorkingHours) {
                # Set an entry
                $offHoursEntries[] = CarbonPeriod::create(
                    $date->copy()->startOfDay(),
                    $date->copy()->endOfDay()->addSecond()
                );

                continue;
            }

            # Skip if wrong syntax
            if (! (isset($dateWorkingHours['start']) && isset($dateWorkingHours['end']))) {
                continue;
            }

            # Set entries
            $offHoursEntries[] = CarbonPeriod::create(
                $date->copy()->startOfDay(),
                $date->copy()->setTimeFromTimeString($dateWorkingHours['start'])
            );

            $offHoursEntries[] = CarbonPeriod::create(
                $date->copy()->setTimeFromTimeString($dateWorkingHours['end']),
                $date->copy()->endOfDay()->addSecond()
            );
        }

        return $offHoursEntries ?? [];
    }

    /**
     * Get time off entries durations
     * 
     * @return array
     */
    protected function timeOffEntriesDurations()
    {
        return [];
    }

    /**
     * Get appointments durations
     * 
     * @return array
     */
    protected function appointmentsDurations()
    {
        return [];
    }

    /**
     * Generate the user's appointment available slots from scratch
     * 
     * @param array $unavailableSlots
     * @return array
     */
    protected function generateAvailableSlots(array $unavailableSlots)
    {
        /**
         * If the current moment is before
         * the start datetime of the first unavailable slot,
         * then add this period
         */
        if ($this->now->lt($unavailableSlots[0]->getStartDate())) {
            $availableSlots[] = CarbonPeriod::create(
                $this->now,
                $unavailableSlots[0]->getStartDate()
            );
        }

        # Loop over unavailable slots and produce available slots
        foreach ($unavailableSlots as $key => $unavailableSlot) {
            # Skip the first slot
            if (0 === $key) {
                continue;
            }

            /**
             * Let's define dates of the available slot:
             * - start date is the end date of the previous unavailable slot
             * - end date is the start date of this unavailable slot
             */
            $availableSlotStart = $unavailableSlots[$key - 1]->getEndDate();
            $availableSlotEnd = $unavailableSlot->getStartDate();

            # Skip if the slot is in past
            if ($availableSlotEnd->isPast()) {
                continue;
            }

            # Change start datetime if the slot is in progress
            if ($this->now->betweenIncluded($availableSlotStart, $availableSlotEnd)) {
                $availableSlots[] = CarbonPeriod::create($this->now, $availableSlotEnd);

                continue;
            }

            $availableSlots[] = CarbonPeriod::create($availableSlotStart, $availableSlotEnd);
        }

        return $availableSlots ?? [];
    }

    /**
     * Drop all the user's appointment available slots
     * 
     * @return void
     */
    protected function dropSlots()
    {
        $this->user->appointmentAvailableSlots()->delete();
    }

    /**
     * Insert available slots into a database
     * 
     * @param array $availableSlots
     * @return void
     */
    protected function insert(array $availableSlots)
    {
        # Check if it makes sense to do something
        if (! $availableSlots) {
            return;
        }

        # Get normalized rows to insert
        $rows = array_map(function($availableSlot) {
            return [
                'id' => (string) Str::uuid(),
                'user_id' => $this->user->getKey(),
                'start_at' => $availableSlot->getStartDate(),
                'end_at' => $availableSlot->getEndDate(),
            ];
        }, $availableSlots);

        # Do insert
        AppointmentAvailableSlot::insert($rows);
    }
}
