<?php
/**
 * @var $Tpl arhone\tpl\Tpl
 * @var $Router arhone\router\Router;
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include __DIR__ . '/../vendor/autoload.php';

$Builder = new arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../config/builder/instruction.php');

$Builder->instruction(include 'module/yandex/config/builder/instruction.php');

$Tpl     = $Builder->make('Tpl');
$Router  = $Builder->make('Router');
$Handler = $Builder->make('Handler');

$Handler->add('cache.set', function ($data) use ($Builder) {
    return $Builder->make('YandexHandler')->news($data);
});

$Handler->event('cache.set', [
    'key'  => 'news.top',
    'data' => 'Новости'
]);


$Router->routing(include 'module/yandex/config/router/routing.php');


$Router->run('POST:/yandex/news', function ($match, $setting) use ($Builder) {
    
    $Module = $Builder->make($setting['controller']);
    $setting['method'] = $setting['method'] ?? 'action';
    $setting['argument'] = $setting['argument'] ?? array_flip($match);
    echo $Module->{$setting['method']}(...array_intersect_key($match, array_flip($setting['argument']))) . '<br>';
    
});