<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Components;

use BladeComponents\Undraw\Components\UndrawComponent;
use BladeComponents\Undraw\Tests\TestCase;

final class BaseComponentTest extends TestCase
{
    /** @test */
    public function it_has_a_color_by_default(): void
    {
        // Arrange
        $undrawComponent = new UndrawComponent('cooking');
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
        $undrawComponent = new UndrawComponent('cooking', '#FF0000');
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
        $undrawComponent = new UndrawComponent('cooking');
        $expectedViewName = 'undraw::components.cooking';

        // Act
        $name = $undrawComponent->render()->name();

        // Assert
        $this->assertSame($expectedViewName, $name);
    }

    /** @test */
    public function it_should_generate_the_view_name_correctly_when_using_different_separators(): void
    {
        // Arrange
        $expectedViewName = 'undraw::components.3d_modeling';

        // Act + Assert
        $this->assertSame($expectedViewName, (new UndrawComponent('3d-modeling'))->render()->name());
        $this->assertSame($expectedViewName, (new UndrawComponent('3d_modeling'))->render()->name());
        $this->assertSame($expectedViewName, (new UndrawComponent('3d modeling'))->render()->name());
    }

    /** @test */
    public function it_should_generate_the_illustration_name_based_on_the_class_name(): void
    {
        // Arrange
        $dummyIllustrationComponent = new DummyIllustrationComponent();
        $expectedIllustrationName = 'dummy_illustration';

        // Act
        $illustrationName = $dummyIllustrationComponent->illustrationName();

        // Assert
        $this->assertSame($expectedIllustrationName, $illustrationName);
    }
}
