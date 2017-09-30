<?php
include __DIR__ . '/../vendor/autoload.php';

$Builder = new arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../config/builder.php');
$Builder->make('Controller')->run('POST:/yandex/news');

$Handler->add('cache:set', function ($match, $key, $value) {
    $CacheRedis->set($key, $value);
});
$Handler->add('cache:set', function ($match, $key, $value) {
    $CacheFile->set($key, $value);
});

$Handler->run('cache:set', 'test', 123);

$Handler->add('cache:get', function ($match, $key) {
    return $CacheRedis->get($key);
});

$Handler->add('cache:get', function ($match, $key) {
    return $CacheFile->get($key);
});

$data = $Handler->run('cache:get', 'test');

$Handler->add('HTTP:GET:/news/([0-9]+)', function () {
    return 'дотуп закрыт';
});

$Handler->add('HTTP:GET:/news/([0-9]+)', function ($match) use ($Tpl) {
    $Tpl->blog('last', $News->last($match[1]));
});

$Handler->add('HTTP:GET:/news/([0-9]+)', function () {
    $Tpl->blog('top', $News->top());
});

if ($response = $Handler->run('HTTP:GET:/news/1')) {
    echo $response;
} elseif ($Tpl->hasBlock('content')) {
    $Tpl->display('index.tpl');
} else {
    $Event->run(404);
}

$Handler->add('block.ad', function ($match, $data) {
    return 'реклама';
});

$Handler->add('block.ad', function ($match, $data) {
    return 'реклама 2';
});

echo $Handler->run('block.ad');
echo $Handler->event('block.ad'); // возвращает колличество слушателей
echo $Handler->request('block.ad'); // возвращает ответ или отсутствие ответа

echo $Handler->any('block.ad');

$Event->handler('event.name', function () {

});

$Event->run('event.name'); // наверное самое подходяещее

$Trigger->handler('trigger.name', function () {

});

$Trigger->run('trigger.name'); // наверное самое подходяещее
