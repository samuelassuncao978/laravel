<?php

namespace App\Jobs\Billing;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\System\Tenant;
use App\Models\System\Invoice;
use App\Models\System\Record;

class Calculate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $now;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->now = now();
        $now = now();

        $tenants = Tenant::where("plan", "!=", null)->get();

        foreach ($tenants as $tenant) {
            $tenant->run(function () use ($tenant, $now) {
                $plan = $this->plan($tenant->plan);
                if ($plan->bills === "daily") {
                    $starts_at =
                        $now
                            ->copy()
                            ->startOfDay()
                            ->format("Y-m-d") . " 00:00:00";
                    $ends_at =
                        $now
                            ->copy()
                            ->endOfDay()
                            ->format("Y-m-d") . " 23:59:59";
                    $division = 1;
                } elseif ($plan->bills === "weekly") {
                    $starts_at =
                        $now
                            ->copy()
                            ->startOfWeek()
                            ->format("Y-m-d") . " 00:00:00";
                    $ends_at =
                        $now
                            ->copy()
                            ->endOfWeek()
                            ->format("Y-m-d") . " 23:59:59";
                    $division = 7;
                } elseif ($plan->bills === "monthly") {
                    $starts_at =
                        $now
                            ->copy()
                            ->firstOfMonth()
                            ->format("Y-m-d") . " 00:00:00";
                    $ends_at =
                        $now
                            ->copy()
                            ->lastOfMonth()
                            ->format("Y-m-d") . " 23:59:59";
                    $division = $now->copy()->daysInMonth;
                }

                $invoice = $tenant
                    ->invoices()
                    ->whereBetween("created_at", [$starts_at, $ends_at])
                    ->first();
                if (!$invoice) {
                    $invoice = new Invoice();
                }
                $invoice->save();
                $tenant->invoices()->syncWithoutDetaching($invoice);

                if ($this->should_record($tenant, $invoice)) {
                    foreach ($plan->calculation() as $row) {
                        $record = Record::create([
                            "plan" => $tenant->plan,
                            "cost" => $row["cost"] / $division,
                            "qty" => $row["qty"],
                            "subtotal" => $row["subtotal"] / $division,
                            "description" => $row["description"],
                        ]);
                        $invoice->records()->syncWithoutDetaching($record);
                    }
                }
            });
        }
    }

    public function plan($plan)
    {
        $classname = "App\\Plans\\" . $plan;
        return new $classname();
    }

    public function should_record($tenant, $invoice)
    {
        $plan = $this->plan($tenant->plan);

        switch ($plan->calculates) {
            case "daily":
                $starts_at = $this->now
                    ->copy()
                    ->startOfDay()
                    ->toDateTimeString();
                $ends_at = $this->now
                    ->copy()
                    ->endOfDay()
                    ->toDateTimeString();
                break;
            case "weekly":
                $starts_at = $this->now
                    ->copy()
                    ->startOfWeek()
                    ->toDateTimeString();
                $ends_at = $this->now
                    ->copy()
                    ->endOfWeek()
                    ->toDateTimeString();
                break;
            case "monthly":
                $starts_at = $this->now
                    ->copy()
                    ->startOfMonth()
                    ->toDateTimeString();
                $ends_at = $this->now
                    ->copy()
                    ->endOfMonth()
                    ->toDateTimeString();
                break;
        }

        return $invoice
            ->records()
            ->whereBetween("created_at", [$starts_at, $ends_at])
            ->first()
            ? false
            : true;
    }
}
