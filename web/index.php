<?php
/**
 * @var $Tpl arhone\tpl\Tpl
 * @var $Router arhone\router\Router;
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include __DIR__ . '/../vendor/autoload.php';

$Builder = new arhone\builder\Builder(include __DIR__ . '/../config/builder/config.php');
$Builder->instruction(include __DIR__ . '/../config/builder/instruction.php');
$Builder->instruction(include 'module/yandex/config/builder/instruction.php');

$Tpl    = $Builder->make('Tpl');
$Router = $Builder->make('Router');

$Router->routing(include 'module/yandex/config/router/routing.php');


$Router->run('/yandex/news', function ($match, $option) use ($Builder) {
    $Module = $Builder->make($option['controller']);
    echo $Module->{$option['method']}(...$match) . '<br>';
});