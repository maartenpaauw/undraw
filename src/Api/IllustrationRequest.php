<?php

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class IllustrationRequest
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(string $image): ResponseInterface
    {
        return $this->client->get($image);
    }
}
