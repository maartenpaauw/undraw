<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
final class IllustrationRequest
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function get(string $uri): ResponseInterface
    {
        return $this->client->get($uri);
    }
}
