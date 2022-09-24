<?php

namespace Lioneagle\Close\Tests;

use Lioneagle\Close\CloseServiceProvider;
use Lioneagle\Close\Tests\Fixtures\CloseAPIFakes;
use Orchestra\Testbench\TestCase as Orchestra;

class FeatureTestCase extends Orchestra
{
    use CloseAPIFakes;

    protected function getPackageProviders($app): array
    {
        return [
            CloseServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        /** @var \Illuminate\Config\Repository $config */
        $config = $app->get('config');

        $config->set('close.api_key', 'foo');

        $app->loadEnvironmentFrom('.env');
    }
}
