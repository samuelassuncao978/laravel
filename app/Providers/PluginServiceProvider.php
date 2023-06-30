<?php

namespace App\Providers;

// Illuminate
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

use PHPSandbox\PHPSandbox;

use App\Models\System\Plugin;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function sandbox($plugin, $code, $input = null)
    {
        $sandbox = new PHPSandbox();
        $sandbox->whitelistClass(optional(optional($plugin->manifest)["module"])["scope"] ?? []);
        $sandbox->whitelistFunc(["api", "array_merge"]);
        $sandbox->defineVar("input", $input);
        $sandbox->setValidationErrorHandler(function ($exception, $sandbox) use ($plugin) {
            \Log::warning("Sandbox code failed to execute (" . $plugin->id . ")", ["response" => $exception->getMessage()]);
            throw $exception;
        });

        $result = $sandbox->execute($code);
        return $result;
    }
}
