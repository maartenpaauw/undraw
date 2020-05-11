<?php

namespace BladeComponents\Undraw\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class UndrawComponent extends Component
{
    /**
     * @var string
     */
    public $color;

    /**
     * @var string
     */
    private $illustration;

    public function __construct(string $color = '#6C63FF', string $illustration = 'outdoor_party')
    {
        $this->color = $color;
        $this->illustration = $illustration;
    }

    public function render()
    {
        $snakeCased = Str::snake(Str::camel($this->illustration));
        return View::make(sprintf('undraw::components.%s', $snakeCased));
    }
}
