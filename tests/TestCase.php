<?php

namespace i3\i3BladeComponents\Tests;

use i3\i3BladeComponents\i3BladeComponentsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            i3BladeComponentsServiceProvider::class,
        ];
    }
}
