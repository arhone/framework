<?php

$_SERVER['DEVELOP'] = !empty($_SERVER['DEVELOP']) ? true : false; // Режим разрабочика

ini_set('error_reporting', E_ALL | E_STRICT); // Типы ошибок, на которые надо ругаться
ini_set('display_errors', $_SERVER['DEVELOP']); // Вывод ошибок
ini_set('error_log', __DIR__ . '/../log/error.log'); // Файл для сохранения ошибок

include __DIR__ . 'autoload.php';

$config  = include __DIR__ . '/../../config/arhone/config.php';
$Builder = include __DIR__ . '/../../config/arhone/builder.php';
$Trigger = include __DIR__ . '/../../config/arhone/trigger.php';

return $Trigger;
