<?php
include __DIR__ . '/../vendor/autoload.php';

$Builder = new arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../config/builder.php');

$Trigger = $Builder->make('Trigger');

$Trigger->handler('cache:(key)', function ($match, $data) {
    return $match[1];
});

$Trigger->handler('cache:(key)', function ($match, $data) {
    return $data . ' Юзер';
});

echo $Trigger->event('cache:key', 'данные');