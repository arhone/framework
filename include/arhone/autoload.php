<?php

$config = include __DIR__ . '/../config/arhone/config.php';

include $config['directory']['library']['composer'] . DIRECTORY_SEPARATOR . 'autoload.php';

spl_autoload_register(function ($className) use ($config) {

    $directory[] = $config['directory']['library']['custom'];
    $directory[] = $config['directory']['library']['extension'];
    $directory[] = $config['directory']['library']['test'];
    $directory[] = $config['directory']['module'];

    foreach ($directory as $dir) {

        $file = $dir . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

        if(is_file($file)) {

            include_once $file;
            break;

        } elseif (strripos($file, 'module' . DIRECTORY_SEPARATOR) !== false) {

            $data = explode('module' . DIRECTORY_SEPARATOR, $file);

            if (count($data) == 2) {

                $vendor  = explode(DIRECTORY_SEPARATOR, $data[1])[0];
                $data[1] = str_replace($vendor . DIRECTORY_SEPARATOR, '', $data[1]);

                $fileList[] = implode('module' . DIRECTORY_SEPARATOR . $vendor . DIRECTORY_SEPARATOR . 'source'    . DIRECTORY_SEPARATOR, $data);
                $fileList[] = implode('module' . DIRECTORY_SEPARATOR . $vendor . DIRECTORY_SEPARATOR . 'library'   . DIRECTORY_SEPARATOR, $data);
                $fileList[] = implode('module' . DIRECTORY_SEPARATOR . $vendor . DIRECTORY_SEPARATOR . 'test'      . DIRECTORY_SEPARATOR, $data);
                $fileList[] = implode('module' . DIRECTORY_SEPARATOR . $vendor . DIRECTORY_SEPARATOR . 'extension' . DIRECTORY_SEPARATOR, $data);

                foreach ($fileList as $file) {

                    if(is_file($file)) {

                        include_once $file;
                        break;

                    }

                }

            }

        }

    }

});