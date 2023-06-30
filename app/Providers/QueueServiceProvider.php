<?php

namespace App\Providers;

use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\QueueManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Arr;

use App\Models\System\Tenant;

class QueueServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function () {
            $this->app->extend("queue", function (QueueManager $queue) {
                $queue->createPayloadUsing(function (string $connection, string $queue = null, array $payload = []) {
                    return ["tenant" => optional(tenant())->id];
                });

                return $queue;
            });
        });

        $this->app["events"]->listen(JobProcessing::class, function ($event) {
            if ($id = Arr::get($event->job->payload(), "tenant")) {
                if ($tenant = Tenant::find($id)) {
                    multitenant()->load($tenant);
                }
            }
        });
    }
}
