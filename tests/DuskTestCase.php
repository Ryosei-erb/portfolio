<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;
    
    protected function baseUrl()
    {
        return 'http://web';
    }

    public static function prepare()
    {
        //  static::startChromeDriver();
    }

    /**
    * Create the RemoteWebDriver instance.
    *
    * @return \Facebook\WebDriver\Remote\RemoteWebDriver
    */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            "--window-size=1000,1000",
            '--disable-dev-shm-usage'
        ]);

        return RemoteWebDriver::create(
            'http://selenium:4444/wd/hub', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
}
