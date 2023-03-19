<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Components\Illustrations;

use BladeComponents\Undraw\Components\Illustrations\Undraw3dModelingComponent;
use BladeComponents\Undraw\Tests\TestCase;

final class Undraw3dModelingComponentTest extends TestCase
{
    /** @test */
    public function it_has_a_color_by_default(): void
    {
        // Arrange
        $undrawComponent = new Undraw3dModelingComponent();
        $expectedColor = '#6C63FF';

        // Act
        $color = $undrawComponent->color;


        // Assert
        $this->assertSame($expectedColor, $color);
    }

    /** @test */
    public function it_can_change_the_color(): void
    {
        // Arrange
        $undrawComponent = new Undraw3dModelingComponent('#FF0000');
        $expectedColor = '#FF0000';

        // Act
        $color = $undrawComponent->color;


        // Assert
        $this->assertSame($expectedColor, $color);
    }

    /** @test */
    public function it_should_generate_the_view_name_correctly(): void
    {
        // Arrange
        $undrawComponent = new Undraw3dModelingComponent();
        $expectedViewName = 'undraw::components.3d_modeling';

        // Act
        $name = $undrawComponent->render()->name();

        // Assert
        $this->assertSame($expectedViewName, $name);
    }
}
