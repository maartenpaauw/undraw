<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Api;

use Illuminate\Support\Str;

/**
 * @internal
 */
final class Illustration
{
    public string $title;

    public string $image;

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
