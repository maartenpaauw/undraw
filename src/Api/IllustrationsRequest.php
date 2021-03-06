<?php

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class IllustrationsRequest
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function page(int $page = 0): ResponseInterface
    {
        return $this->client->get('illustrations', [
            'query' => [
                'page' => $page,
            ]
        ]);
    }
}
