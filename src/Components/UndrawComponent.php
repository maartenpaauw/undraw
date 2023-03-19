<?php

namespace BladeComponents\Undraw\Components;

final class UndrawComponent extends BaseComponent
{
    /**
     * @var string
     */
    private $illustration;

    public function __construct(string $illustration, string $color = '#6C63FF')
    {
        parent::__construct($color);

        $this->illustration = $illustration;
    }

    protected function illustrationName(): string
    {
        return $this->illustration;
    }
}
