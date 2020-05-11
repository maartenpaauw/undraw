<?php

namespace BladeComponents\Undraw\Api;

use GuzzleHttp\Client;

class UndrawClient extends Client
{
    public function __construct()
    {
        parent::__construct([
            'base_uri' => 'https://undraw.co/api/',
        ]);
    }
}
