<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Components;

use Illuminate\Support\Str;

final class UndrawComponent extends BaseComponent
{
    private string $illustration;

    public function __construct(string $illustration, string $color = '#6C63FF')
    {
        parent::__construct($color);

        $this->illustration = $illustration;
    }

    protected function illustrationName(): string
    {
        return Str::slug($this->illustration, '_');
    }
}
