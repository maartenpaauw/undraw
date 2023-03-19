<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Api;

use BladeComponents\Undraw\Api\IllustrationRequest;
use BladeComponents\Undraw\Api\IllustrationsRequest;
use BladeComponents\Undraw\Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

final class IllustrationsRequestTest extends TestCase
{
    /** @test */
    public function it_should_return_a_page_correctly(): void
    {
        // Arrange
        $mock = new MockHandler([
            new Response(200),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $illustrationsRequest = new IllustrationsRequest($client);

        // Act
        $response = $illustrationsRequest->page(1);

        // Assert
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getStatusCode());
    }
}
