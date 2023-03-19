<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Components;

use BladeComponents\Undraw\Components\BaseComponent;

final class DummyIllustrationComponent extends BaseComponent
{
    public function illustrationName(): string
    {
        return parent::illustrationName();
    }
}
