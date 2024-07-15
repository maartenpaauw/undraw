<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Api;

use BladeComponents\Undraw\Api\Illustration;
use BladeComponents\Undraw\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;

final class IllustrationTest extends TestCase
{
    #[Test]
    #[DataProvider('slugDataProvider')]
    public function it_should_covert_the_title_to_a_slug_correctly(string $title, string $expectedSlug): void
    {
        // Arrange
        $illustration = new Illustration($title, '-');

        // Act
        $slug = $illustration->slug();

        // Assert
        $this->assertSame($expectedSlug, $slug);
    }

    public static function slugDataProvider(): array
    {
        return [
            ['3d modeling', '3d-modeling'],
            ['Camping', 'camping'],
            ['Order delivered', 'order-delivered'],
        ];
    }

    #[Test]
    #[DataProvider('snakeDataProvider')]
    public function it_should_covert_the_title_to_a_snake_correctly(string $title, string $expectedSnake): void
    {
        // Arrange
        $illustration = new Illustration($title, '-');

        // Act
        $snake = $illustration->snake();

        // Assert
        $this->assertSame($expectedSnake, $snake);
    }

    public static function snakeDataProvider(): array
    {
        return [
            ['3d modeling', '3d_modeling'],
            ['Camping', 'camping'],
            ['Order delivered', 'order_delivered'],
        ];
    }

    #[Test]
    #[DataProvider('studlyDataProvider')]
    public function it_should_covert_the_title_to_a_studly_correctly(string $title, string $expectedStudly): void
    {
        // Arrange
        $illustration = new Illustration($title, '-');

        // Act
        $studly = $illustration->studly();

        // Assert
        $this->assertSame($expectedStudly, $studly);
    }

    public static function studlyDataProvider(): array
    {
        return [
            ['3d modeling', '3dModeling'],
            ['Camping', 'Camping'],
            ['Order delivered', 'OrderDelivered'],
        ];
    }
}
