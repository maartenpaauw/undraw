<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Api;

use BladeComponents\Undraw\Api\Illustration;
use BladeComponents\Undraw\Tests\TestCase;

final class IllustrationTest extends TestCase
{
    /**
     * @test
     * @dataProvider slugDataProvider
     *
     * @param string $title
     * @param string $expectedSlug
     */
    public function it_should_covert_the_title_to_a_slug_correctly(string $title, string $expectedSlug): void
    {
        // Arrange
        $illustration = new Illustration($title, '-');

        // Act
        $slug = $illustration->slug();

        // Assert
        $this->assertSame($expectedSlug, $slug);
    }

    public function slugDataProvider(): array
    {
        return [
            ['3d modeling', '3d-modeling'],
            ['Camping', 'camping'],
            ['Order delivered', 'order-delivered'],
        ];
    }

    /**
     * @test
     * @dataProvider snakeDataProvider
     *
     * @param string $title
     * @param string $expectedSnake
     */
    public function it_should_covert_the_title_to_a_snake_correctly(string $title, string $expectedSnake): void
    {
        // Arrange
        $illustration = new Illustration($title, '-');

        // Act
        $snake = $illustration->snake();

        // Assert
        $this->assertSame($expectedSnake, $snake);
    }

    public function snakeDataProvider(): array
    {
        return [
            ['3d modeling', '3d_modeling'],
            ['Camping', 'camping'],
            ['Order delivered', 'order_delivered'],
        ];
    }

    /**
     * @test
     * @dataProvider studlyDataProvider
     *
     * @param string $title
     * @param string $expectedStudly
     */
    public function it_should_covert_the_title_to_a_studly_correctly(string $title, string $expectedStudly): void
    {
        // Arrange
        $illustration = new Illustration($title, '-');

        // Act
        $studly = $illustration->studly();

        // Assert
        $this->assertSame($expectedStudly, $studly);
    }

    public function studlyDataProvider(): array
    {
        return [
            ['3d modeling', '3dModeling'],
            ['Camping', 'Camping'],
            ['Order delivered', 'OrderDelivered'],
        ];
    }
}
