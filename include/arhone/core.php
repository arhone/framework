<?php

$_SERVER['DEVELOP'] = !empty($_SERVER['DEVELOP']) ? true : false; // Режим разрабочика

ini_set('error_reporting', E_ALL | E_STRICT); // Типы ошибок, на которые надо ругаться
ini_set('display_errors', $_SERVER['DEVELOP']); // Вывод ошибок
ini_set('error_log', __DIR__ . '/../log/error.log'); // Файл для сохранения ошибок

include __DIR__ . 'autoload.php';

$Builder = new \arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../../config/arhone/builder.php');

try {

    // Регистрация триггеров
    $Trigger = $Builder->make('Trigger');
    foreach (include __DIR__ . '/../../config/arhone/trigger.php' as $action => $item) {

        foreach ($item as $instruction) {

            if (isset($instruction['class']) && isset($instruction['method'])) {

                $Trigger->add($action, function ($match, $data) use ($instruction, $Builder) {

                    $Class = $Builder->make($instruction['class']);

                    $match[0] = $data;
                    return $Class->{$instruction['method']}(...array_intersect_key($match, array_flip($instruction['argument'] ?? array_keys($match))));

                }, [
                    'name'     => $instruction['name'] ?? null,
                    'position' => $instruction['position'] ?? null,
                    'break'    => $instruction['break'] ?? null,
                    'status'   => $instruction['status'] ?? true
                ]);

            }

        }

    }

    // Создание символических ссылок
    foreach (include __DIR__ . '/../../config/arhone/symlink.php' as $target => $link) {

        if (file_exists($target) && !file_exists($link)) {
            symlink($target, $link);
        }

    }

    return $Trigger;

} catch (Exception $Exception) {

    echo $Exception->getMessage();

}
