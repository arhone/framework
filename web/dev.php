<?php
include __DIR__ . '/../core/start.php';

ini_set('display_errors', true); // Вывод ошибок

$Builder = new arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../config/builder.php');

echo $Builder->make('Controller')->run('HTTP:' . $_SERVER['REQUEST_METHOD'] . ':' . $_SERVER['REQUEST_URI'] ?? '/');