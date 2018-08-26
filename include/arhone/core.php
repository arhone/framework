<?php

$_SERVER['DEVELOP'] = !empty($_SERVER['DEVELOP']) ? true : false; // Режим разрабочика

ini_set('error_reporting', E_ALL | E_STRICT); // Типы ошибок, на которые надо ругаться
ini_set('display_errors', $_SERVER['DEVELOP']); // Вывод ошибок
ini_set('error_log', __DIR__ . '/../log/error.log'); // Файл для сохранения ошибок

include __DIR__ . '/autoload.php';

$Builder = new \arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../../config/arhone/builder.php');

try {

    // Регистрация триггеров
    $Trigger = $Builder->make('Trigger');
    foreach (include __DIR__ . '/../../config/arhone/trigger.php' as $action => $item) {

        foreach ($item as $instruction) {

            if (isset($instruction['controller']) && isset($instruction['method'])) {

                $Trigger->add($action, function ($match, $data) use ($instruction, $Builder) {

                    $Class = $Builder->make($instruction['controller']);

                    $array = [];
                    foreach ($instruction['argument'] ?? [] as $key => $value) {

                        if ($value === 0) {
                            $array[$key] = $data;
                        } elseif ((int)$value && isset($match[$key])) {
                            $array[$key] = $match[$key];
                        } elseif ($Builder->has($value)) {
                            $array[$key] = $Builder->make($value);
                        }

                    }

                    return $Class->{$instruction['method']}(...$array);

                }, [
                    'name'     => $instruction['name']     ?? $instruction['controller'],
                    'position' => $instruction['position'] ?? null,
                    'break'    => $instruction['break']    ?? null,
                    'status'   => $instruction['status']   ?? true
                ]);

            }

        }

    }

    // Создание символических ссылок
    foreach (include __DIR__ . '/../../config/arhone/symlink.php' as $target => $link) {

        $target = str_replace('/', '\\', $target);
        $link   = str_replace('/', '\\', $link);

        if (file_exists($target) && !file_exists($link)) {
            symlink($target, $link);
        }

    }

    return $Trigger;

} catch (Exception $Exception) {

    echo $Exception->getMessage();

}
