<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Api;

use BladeComponents\Undraw\Api\IllustrationRequest;
use BladeComponents\Undraw\Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\Test;
use Psr\Http\Message\ResponseInterface;

final class IllustrationRequestTest extends TestCase
{
    #[Test]
    public function it_should_return_an_illustration_response_correctly(): void
    {
        // Arrange
        $mock = new MockHandler([
            new Response(200),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $illustrationRequest = new IllustrationRequest($client);

        // Act
        $response = $illustrationRequest->get('https://example.com');

        // Assert
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getStatusCode());
    }
}
