<?php

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class IllustrationRequest
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function get(string $uri): ResponseInterface
    {
        return $this->client->get($uri);
    }
}
