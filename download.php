<?php

require 'vendor/autoload.php';

use BladeComponents\Undraw\Api\IllustrationRequest;
use BladeComponents\Undraw\Api\IllustrationResponse;
use BladeComponents\Undraw\Api\IllustrationsRequest;
use BladeComponents\Undraw\Api\IllustrationsResponse;
use BladeComponents\Undraw\Api\UndrawClient;
use BladeComponents\Undraw\Api\Illustration;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

$client = new Client();
$undrawClient = new UndrawClient();
$illustrationsRequest = new IllustrationsRequest($undrawClient);

$hasMore = true;
$page = 0;

while ($hasMore) {
    $illustrationsResponse = new IllustrationsResponse($illustrationsRequest->page($page));

    $hasMore = $illustrationsResponse->hasMore();
    $page = $illustrationsResponse->nextPage();

    /** @var Illustration $illustration */
    foreach ($illustrationsResponse->illustrations() as $illustration) {
        $illustrationRequest = new IllustrationRequest($client);
        try {
            $illustrationResponse = new IllustrationResponse($illustrationRequest->get($illustration->image));
        } catch (GuzzleException $e) {
            continue;
        }

        $filename = sprintf('resources/views/components/%s.blade.php', $illustration->snake());
        $svg = str_replace('fill="#6c63ff"', 'fill="{{ $color }}"', $illustrationResponse->svg());
        $svg = preg_replace('/width="\d+(.\d+)?"\s/', '', $svg, 1);
        $svg = preg_replace('/height="\d+(.\d+)?"\s/', '', $svg, 1);
        $svg = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $svg);

        file_put_contents($filename, $svg);
    }
}
