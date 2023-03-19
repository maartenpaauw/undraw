<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Api;

use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
final class IllustrationResponse
{
    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function svg(): string
    {
        return $this->response->getBody()->getContents();
    }
}
