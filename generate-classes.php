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

while ($hasMore) {
    $illustrationsResponse = new IllustrationsResponse($illustrationsRequest->page($page));

    $hasMore = $illustrationsResponse->hasMore();
    $page = $illustrationsResponse->nextPage();

    /** @var Illustration $illustration */
    foreach ($illustrationsResponse->illustrations() as $illustration) {
        $className = sprintf('Undraw%sComponent', $illustration->studly());
        $fileName = sprintf('src/Components/Illustrations/%s.php', $className);

        $dummyComponent = file_get_contents('stubs/DummyIllustrationComponent.stub');
        $content = str_replace('DummyIllustrationComponent', $className, $dummyComponent);

        file_put_contents($fileName, $content);
    }
}
