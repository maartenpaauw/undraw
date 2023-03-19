<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Api;

use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
final class IllustrationsResponse
{
    /**
     * @var array<string, mixed>
     */
    private array $contents;

    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->contents = json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return array<array-key, Illustration>
     */
    public function illustrations(): array
    {
        if ($this->response->getStatusCode() !== 200) {
            return [];
        }

        $illustrationList = $this->contents['illos'];

        if (!$illustrationList) {
            return [];
        }

        return array_map(static function (array $illustration): Illustration {
            return new Illustration($illustration['title'], $illustration['image']);
        }, $illustrationList);
    }

    public function hasMore(): bool
    {
        if ($this->response->getStatusCode() !== 200) {
            return false;
        }

        return $this->contents['hasMore'];
    }

    public function nextPage(): int
    {
        if ($this->response->getStatusCode() !== 200) {
            return 0;
        }

        return $this->contents['nextPage'];
    }
}
