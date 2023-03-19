<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Api;

use BladeComponents\Undraw\Api\Illustration;
use BladeComponents\Undraw\Api\IllustrationsResponse;
use BladeComponents\Undraw\Tests\TestCase;
use GuzzleHttp\Psr7\Response;

final class IllustrationsResponseTest extends TestCase
{
    /** @test */
    public function it_should_return_the_next_page_correctly(): void
    {
        // Arrange
        $response = new Response(200, [], json_encode(['nextPage' => 10]));
        $illustrationsResponse = new IllustrationsResponse($response);
        $expectedNextPage = 10;

        // Act
        $nextPage = $illustrationsResponse->nextPage();

        // Assert
        $this->assertSame($expectedNextPage, $nextPage);
    }

    /** @test */
    public function it_should_return_zero_for_next_page_when_the_status_code_is_not_200(): void
    {
        // Arrange
        $response = new Response(422);
        $illustrationsResponse = new IllustrationsResponse($response);
        $expectedNextPage = 0;

        // Act
        $nextPage = $illustrationsResponse->nextPage();

        // Assert
        $this->assertSame($expectedNextPage, $nextPage);
    }

    /** @test */
    public function it_should_return_true_when_there_are_more_pages(): void
    {
        // Arrange
        $response = new Response(200, [], json_encode(['hasMore' => true]));
        $illustrationsResponse = new IllustrationsResponse($response);

        // Act
        $hasMore = $illustrationsResponse->hasMore();

        // Assert
        $this->assertTrue($hasMore);
    }

    /** @test */
    public function it_should_return_false_for_has_more_when_the_status_code_is_not_200(): void
    {
        // Arrange
        $response = new Response(422);
        $illustrationsResponse = new IllustrationsResponse($response);

        // Act
        $hasMore = $illustrationsResponse->hasMore();

        // Assert
        $this->assertFalse($hasMore);
    }

    /** @test */
    public function it_returns_an_empty_array_when_the_status_code_is_not_200(): void
    {
        // Arrange
        $response = new Response(422);
        $illustrationsResponse = new IllustrationsResponse($response);

        // Act
        $illustrations = $illustrationsResponse->illustrations();

        // Assert
        $this->assertEmpty($illustrations);
    }

    /** @test */
    public function it_returns_an_empty_array_when_there_are_no_illustrations(): void
    {
        // Arrange
        $response = new Response(200, [], json_encode(['illos' => null]));
        $illustrationsResponse = new IllustrationsResponse($response);

        // Act
        $illustrations = $illustrationsResponse->illustrations();

        // Assert
        $this->assertEmpty($illustrations);
    }

    /** @test */
    public function it_returns_a_list_of_illustrations(): void
    {
        // Arrange
        $content = ['illos' => [
            [
                'title' => 'A',
                'image' => 'https://example.com/a.svg',
            ],
            [
                'title' => 'B',
                'image' => 'https://example.com/b.svg',
            ],
        ]];

        $response = new Response(200, [], json_encode($content));
        $illustrationsResponse = new IllustrationsResponse($response);

        // Act
        $illustrations = $illustrationsResponse->illustrations();

        // Assert
        $this->assertCount(2, $illustrations);

        /** @var Illustration $first */
        $first = $illustrations[0];
        $this->assertSame('A', $first->title);
        $this->assertSame('https://example.com/a.svg', $first->image);

        /** @var Illustration $seconds */
        $seconds = $illustrations[1];
        $this->assertSame('B', $seconds->title);
        $this->assertSame('https://example.com/b.svg', $seconds->image);
    }
}
