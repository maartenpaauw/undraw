<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests;

use BladeComponents\Undraw\Providers\UndrawServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            UndrawServiceProvider::class,
        ];
    }
}
