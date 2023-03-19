<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
final class IllustrationsRequest
{
    private ClientInterface $client;

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
