<?php

namespace Lioneagle\Close\Tests;

use Lioneagle\Close\CloseServiceProvider;
use Orchestra\Testbench\TestCase;

class IntegrationTestCase extends TestCase
{
    protected $loadEnvironmentVariables = true;
    
    protected function getPackageProviders($app): array
    {
        return [
            CloseServiceProvider::class,
        ];
    }
}