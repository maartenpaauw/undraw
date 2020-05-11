<?php

namespace BladeComponents\Undraw\Api;

use BladeComponents\Undraw\Illustration;
use Psr\Http\Message\ResponseInterface;

class IllustrationsRequest
{
    /**
     * @var UndrawClient
     */
    private $undrawClient;

    public function __construct(UndrawClient $undrawClient)
    {
        $this->undrawClient = $undrawClient;
    }

    public function page(int $page = 0): ResponseInterface
    {
        return $this->undrawClient->get('illustrations', [
            'query' => [
                'page' => $page,
            ]
        ]);
    }
}
