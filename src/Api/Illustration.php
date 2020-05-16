<?php

namespace BladeComponents\Undraw\Api;

use Illuminate\Support\Str;

class Illustration
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $image;

    public function __construct(string $title, string $image)
    {
        $this->title = $title;
        $this->image = $image;
    }

    public function slug(): string
    {
        return Str::slug($this->title);
    }

    public function snake(): string
    {
        return Str::snake($this->title);
    }

    public function studly(): string
    {
        return Str::studly($this->title);
    }
}
