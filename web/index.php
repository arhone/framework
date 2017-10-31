<?php

# Кодировка
mb_internal_encoding("UTF-8");
# Файл для сохранения ошибок
ini_set('error_log', __DIR__ . '/../log/error.log');
# Типы ошибок, на которые надо ругаться
ini_set('error_reporting', E_ALL | E_STRICT);
# Вывод ошибок
ini_set('display_errors', 'On');

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../autoload.php';

$Builder = new arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../config/builder.php');

echo $Builder->make('Controller')->run('HTTP:' . $_SERVER['REQUEST_METHOD'] . ':' . $_SERVER['REQUEST_URI'] ?? '/');