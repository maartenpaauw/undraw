<?php

use BladeComponents\Undraw\Api\Illustration;
use BladeComponents\Undraw\Api\IllustrationsRequest;
use BladeComponents\Undraw\Api\IllustrationsResponse;
use BladeComponents\Undraw\Api\UndrawClient;

require 'vendor/autoload.php';

$undrawClient = new UndrawClient();
$illustrationsRequest = new IllustrationsRequest($undrawClient);

$hasMore = true;
$page = 0;

$componentList = [];

while ($hasMore) {
    $illustrationsResponse = new IllustrationsResponse($illustrationsRequest->page($page));

    $hasMore = $illustrationsResponse->hasMore();
    $page = $illustrationsResponse->nextPage();

    /** @var Illustration $illustration */
    foreach ($illustrationsResponse->illustrations() as $illustration) {
        $className = sprintf('\BladeComponents\Undraw\Components\Illustrations\Undraw%sComponent::class', $illustration->studly());

        $componentList[] = sprintf("%s => '%s'", $className, $illustration->slug());
    }
}

sort($componentList);

$dummyServiceProvider = file_get_contents('stubs/UndrawServiceProvider.stub');
$content = str_replace('DummyComponentList', implode(',' . PHP_EOL . '            ', $componentList).',', $dummyServiceProvider);

file_put_contents('src/Providers/UndrawServiceProvider.php', $content);
