<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Tests\Api;

use BladeComponents\Undraw\Api\UndrawClient;
use BladeComponents\Undraw\Tests\TestCase;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\Attributes\Test;

final class UndrawClientTest extends TestCase
{
    #[Test]
    public function it_should_set_the_base_uri_correctly(): void
    {
        // Arrange
        $undrawClient = new UndrawClient();
        $config = $undrawClient->getConfig();

        // Act
        /** @var Uri $baseUri */
        $baseUri = $config['base_uri'];

        // Assert
        $this->assertSame('https', $baseUri->getScheme());
        $this->assertSame('undraw.co', $baseUri->getHost());
        $this->assertSame('/api/', $baseUri->getPath());
    }
}
