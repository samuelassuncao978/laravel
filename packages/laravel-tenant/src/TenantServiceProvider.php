<?php

namespace Laravel\Tenant;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Str;

// Middleware
use Laravel\Tenant\Middleware\TenantIdentificationMiddleware;
use Laravel\Tenant\Middleware\RedirectionMiddleware;
use Laravel\Tenant\Middleware\TenantMaintenanceMiddleware;
use Laravel\Tenant\Middleware\TenantDeletedMiddleware;
use Laravel\Tenant\Middleware\TenantSuspendedMiddleware;

use Laravel\Tenant\Commands\MigratePlansCommand;

use Laravel\Tenant\Overrides\Migrate;
use Laravel\Tenant\Overrides\Seed;

// Providers
use Laravel\Tenant\Tenants;
use Laravel\Tenant\Overrides\QueueProvider;

class TenantServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->configuration();
    }

    public function boot(Router $router, Kernel $kernel)
    {
        $this->app->extend("command.migrate", function ($app) {
            return new Migrate(app("migrator"), new Dispatcher());
        });

        $this->app->extend("command.seed", function ($app) {
            return new Seed(app(\Illuminate\Database\ConnectionResolverInterface::class), new Dispatcher());
        });
        // $this->app->extend('command.migrate.fresh', function ($app) {
        //     dd('refresh function');
        // });

        $this->migrations();

        $this->console();
    }

    public function configuration()
    {
        if (!$this->app->configurationIsCached()) {
            $this->mergeConfigFrom(dirname(__DIR__) . "/src/Config/Config.php", "tenants");
        }
    }

    public function migrations()
    {
        config([
            "tenants.migration-path" => database_path("/migrations/system"),
        ]);
    }

    public function console()
    {
        $this->app->singleton(MigrateTenantsCommand::class, function ($app) {
            return new MigrateTenantsCommand(app("migrator"), new Dispatcher());
        });
    }
}
