<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;

use App\Models\System\Tenant;
use App\Models\System\Connection;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    public function __construct()
    {
        parent::__construct();
        $this->afterApplicationCreated(function () {
            config(["database.connections.sqlite.database" => storage_path("app/databases/database.sqlite")]);
            array_map("unlink", array_filter((array) array_merge(glob(storage_path("app/databases") . "/*"))));
            ($fh = fopen(storage_path("app/databases/database.sqlite"), "w")) or die("can't create DB");
            $this->artisan("migrate");
            $tenant = Tenant::create([
                "domain" => "platform.lndo.site",
                "database" => (new Connection())->create(),
            ]);
            multitenant()->load(Tenant::first());
            $tenant->migrate();
            // $tenant->seed();
        });
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
        if (!static::runningInSail()) {
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions())->addArguments(
            collect(["--window-size=1920,1080"])
                ->unless($this->hasHeadlessDisabled(), function ($items) {
                    return $items->merge(["--disable-gpu", "--headless"]);
                })
                ->all()
        );

        return RemoteWebDriver::create($_ENV["DUSK_DRIVER_URL"] ?? "http://localhost:9515", DesiredCapabilities::chrome()->setCapability(ChromeOptions::CAPABILITY, $options));
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     *
     * @return bool
     */
    protected function hasHeadlessDisabled()
    {
        return isset($_SERVER["DUSK_HEADLESS_DISABLED"]) || isset($_ENV["DUSK_HEADLESS_DISABLED"]);
    }
}
