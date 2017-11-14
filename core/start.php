<?php
mb_internal_encoding('utf-8'); // Кодировка
ini_set('error_reporting', E_ALL | E_STRICT); // Типы ошибок, на которые надо ругаться
ini_set('display_errors', false); // Вывод ошибок
ini_set('error_log', __DIR__ . '/../log/error.log'); // Файл для сохранения ошибок

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/autoload.php';