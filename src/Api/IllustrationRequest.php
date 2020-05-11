<?php

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class IllustrationRequest
{
    /**
     * @var Client
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
