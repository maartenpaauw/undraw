<?php

namespace BladeComponents\Undraw\Tests\Api;

use BladeComponents\Undraw\Api\IllustrationResponse;
use BladeComponents\Undraw\Tests\TestCase;
use GuzzleHttp\Psr7\Response;

class IllustrationResponseTest extends TestCase
{
    /** @test */
    public function it_should_receive_the_response_content_correctly(): void
    {
        // Arrange
        $response = new Response(200, [], '<svg></svg>');
        $illustrationResponse = new IllustrationResponse($response);
        $expectedSvg = '<svg></svg>';

        // Act
        $svg = $illustrationResponse->svg();

        // Assert
        $this->assertSame($expectedSvg, $svg);
    }
}
