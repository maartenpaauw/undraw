<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    /**
     * @var string
     */
    public $color;

    public function __construct(string $color = '#6C63FF')
    {
        $this->color = $color;
    }

    protected function illustrationName(): string
    {
        $calledComponent = Str::afterLast(get_called_class(), '\\');
        $illustration = str_replace(['Undraw', 'Component'], '', $calledComponent);

        return Str::snake($illustration);
    }

    public function render()
    {
        return View::make(sprintf('undraw::components.%s', $this->illustrationName()));
    }
}
