<?php

$config = include __DIR__ . '/config/config.php';

include $config['directory']['library']['composer'] . '/autoload.php';

spl_autoload_register(function ($className) use ($config) {

    $directory[] = $config['directory']['module'];
    $directory[] = $config['directory']['library']['custom'];
    $directory[] = $config['directory']['library']['extension'];

    foreach ($directory as $dir) {

        $file = $dir . '/' . str_replace('\\', '/', $className) . '.php';

        if(is_file($file)) {

            require_once $file;
            break;

        }

    }

});