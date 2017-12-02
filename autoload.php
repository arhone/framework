<?php

include __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($className) {

    $directory[] = __DIR__ . '/extension';
    $directory[] = __DIR__ . '/library';
    $directory[] = __DIR__ . '/web/module';
    foreach ($directory as $dir) {

        $file = $dir . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

        if(is_file($file)) {

            include_once $file;
            break;

        }

    }

});