<?php

namespace Lioneagle\Close\Tests;

use Lioneagle\Close\CloseServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class IntegrationTestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            CloseServiceProvider::class,
        ];
    }
}