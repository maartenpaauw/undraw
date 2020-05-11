<?php

namespace BladeComponents\Undraw\Api;

use BladeComponents\Undraw\Illustration;
use Psr\Http\Message\ResponseInterface;

class IllustrationsResponse
{

    /**
     * @var array
     */
    private $contents;

    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->contents = json_decode($response->getBody()->getContents(), true);
    }

    public function illustrations(): array
    {
        if ($this->response->getStatusCode() !== 200) {
            return [];
        }

        $illustrationList = $this->contents['illustrations'];

        if (!$illustrationList) {
            return [];
        }

        $illustrations = [];

        foreach ($illustrationList as $illustration) {
            $illustrations[] = new Illustration($illustration['title'], $illustration['image']);
        }

        return $illustrations;
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
