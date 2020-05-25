<?php

namespace BladeComponents\Undraw\Tests;

use BladeComponents\Undraw\Providers\UndrawServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            UndrawServiceProvider::class,
        ];
    }
}
