<?php

declare(strict_types=1);

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\Client;

/**
 * @internal
 */
final class UndrawClient extends Client
{
    public function __construct()
    {
        parent::__construct([
            'base_uri' => 'https://undraw.co/api/',
        ]);
    }
}
