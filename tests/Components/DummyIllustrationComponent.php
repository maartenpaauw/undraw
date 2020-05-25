<?php

namespace BladeComponents\Undraw\Tests\Components;

use BladeComponents\Undraw\Components\BaseComponent;

class DummyIllustrationComponent extends BaseComponent
{
    public function illustrationName(): string
    {
        return parent::illustrationName();
    }
}
