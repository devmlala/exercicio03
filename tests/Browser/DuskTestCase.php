<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;


abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver(): RemoteWebDriver
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--window-size=1920,1080',
            '--ignore-certificate-errors',
            '--no-sandbox',
            '--whitelisted-ips',
            '--disable-dev-shm-usage',
            '--disable-extensions',
            '--disable-popup-blocking',
            '--start-maximized',
            '--disable-infobars',
        ]);

        return RemoteWebDriver::create(
            $_SERVER['DUSK_DRIVER_URL'] ?? 'http://127.0.0.1:8000',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )//->setHeadless(false) // Aqui você desativa o headless mode
        );
    }
}
