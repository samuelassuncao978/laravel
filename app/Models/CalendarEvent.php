<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\CarbonPeriod;

// Models
use App\Models\Calendar;

// Traits
use App\Traits\UsesUuid;

// Jobs
use App\Jobs\Calendar\SyncEvent;

class CalendarEvent extends Model
{
    use UsesUuid, SoftDeletes;

    protected $table = "calendar_events";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name", "start_at", "end_at", "calendar_id", "reference", "external_id", "is_recurring", "recurrence", "is_busy", "recurring_event_external_id"];

    protected $casts = [
        "start_at" => \App\Casts\DateTime::class,
        "end_at" => \App\Casts\DateTime::class,
        "created_at" => "date",
        "updated_at" => "date",
        "deleted_at" => "date",
        "recurrence" => "array",
        "is_busy" => "boolean",
    ];

    public function calendar()
    {
        return $this->hasOne(Calendar::class, "id", "calendar_id");
    }

    /**
     * Find by external id
     */
    public function scopeWhereExternalId($query, $externalId)
    {
        return $query->where("external_id", $externalId);
    }

    /**
     * Constraining only recurring events
     */
    public function scopeIsRecurring($query, $value = 1)
    {
        return $query->where('is_recurring', $value);
    }

    /**
     * Sync this event with a remote copy
     */
    public function sync()
    {
        SyncEvent::dispatch($this);

        return $this;
    }

    /**
     * External id getter
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * Is this event recurring
     */
    public function isRecurring()
    {
        return $this->is_recurring;
    }

    /**
     * Is this event an all-day
     */
    public function isAllDay()
    {
        if ($this->start_at->diffInDays($this->end_at) === 1) {
            return true;
        }

        return false;
    }

    /**
     * Get the event period
     */
    public function getPeriod()
    {
        return CarbonPeriod::create($this->start_at, $this->end_at);
    }

    /**
     * Get the event duration in seconds
     */
    public function getDurationInSeconds()
    {
        return $this->start_at->diffInSeconds($this->end_at);
    }
}
