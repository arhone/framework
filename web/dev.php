<?php
ini_set('error_reporting', E_ALL | E_STRICT); // Типы ошибок, на которые надо ругаться
ini_set('display_errors', true); // Вывод ошибок
ini_set('error_log', __DIR__ . '/../log/error.log'); // Файл для сохранения ошибок

include __DIR__ . '/../core/autoload.php';

$Builder = new arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../config/builder.php');

echo $Builder->make('Controller')->run('HTTP:' . ($_SERVER['REQUEST_METHOD'] ?? 'GET') . ':' . strtok($_SERVER['REQUEST_URI'] ?? '/', '?'));