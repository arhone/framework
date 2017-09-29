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

$Tpl    = $Builder->make('Tpl');
$Router = $Builder->make('Router');

$Router->routing([
    '/([a-z]+)/([0-9]+)' => [
        [
            'controller' => 'NewsIndexController',
            'argument' => [1, 2]
        ]
    ]
]);

$Router->add('/([a-z]+)/([0-9]+)', [
    'echo' => 'Второй'
]);
$Router->add('/([a-z]+)/([0-9]+)', [
    'echo' => 'Третий'
]);

$Router->run('/test/1', function ($match, $option) {
    print_r($match);
    echo $option['echo'] . '<br>';
});