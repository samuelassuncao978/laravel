<?php

namespace App\Providers;

// Illuminate
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

// Models
use App\Models\System\Plugin;

class WebhookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->webhooks();
    }

    public function webhooks()
    {
        \Event::listen(["App\\Events\\*"], function ($event, $data) {
            $event_name = str_replace("App\\", "", $event);
            foreach (
                tenant()
                    ->plugins()
                    ->whereJsonContains("manifest->webhooks->subscriptions", $event_name)
                    ->get()
                as $plugin
            ) {
                $payload = array_values((array) $data[0]);
                $signature = hash_hmac("sha256", json_encode($payload), $plugin->id);
                try {
                    $request = Http::timeout(3)
                        ->withHeaders([
                            "X-Signature" => $signature,
                            "X-Tenant" => tenant()->domain,
                        ])
                        ->post($plugin->manifest->webhooks->endpoint, $payload);
                    if ($request->failed()) {
                        \Log::warning("Failed dispatch on plugin (" . $plugin->id . ") for event " . $event_name, [
                            "payload" => $payload,
                            "signature" => $signature,
                            "response" => $request->body(),
                        ]);
                    }
                } catch (\Exception $exception) {
                    \Log::warning("Failed dispatch on plugin (" . $plugin->id . ") for event " . $event_name, [
                        "payload" => $payload,
                        "signature" => $signature,
                        "response" => $exception->getMessage(),
                    ]);
                }
            }
        });
    }
}
