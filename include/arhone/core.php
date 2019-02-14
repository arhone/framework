<?php

$_SERVER['ENVIRONMENT'] = !empty($_SERVER['ENVIRONMENT']) ? $_SERVER['ENVIRONMENT'] : null; // Окружение

ini_set('error_reporting', E_ALL | E_STRICT); // Типы ошибок, на которые надо ругаться
ini_set('display_errors', $_SERVER['DEVELOP']); // Вывод ошибок
ini_set('error_log', __DIR__ . '/../log/error.log'); // Файл для сохранения ошибок

include __DIR__ . '/autoload.php';

$builder = new \arhone\construction\builder\Builder();
$builder->instruction(include __DIR__ . '/../../config/arhone/builder.php');

try {

    // Регистрация триггеров
    $trigger = $builder->make('Trigger');
    foreach (include __DIR__ . '/../../config/arhone/handler.php' as $instruction) {

        if (isset($instruction['pattern']) && isset($instruction['class']) && isset($instruction['method'])) {

            $trigger->add($instruction['pattern'], function ($match, $data) use ($instruction, $builder) {

                $class = $builder->make($instruction['class']);

                $array = [];
                foreach ($instruction['argument'] ?? [] as $key => $value) {

                    if ($value === 0) {
                        $array[$key] = $data;
                    } elseif ((int)$value && isset($match[(int)$value])) {
                        $array[$key] = $match[(int)$value];
                    } elseif ($builder->has($value)) {
                        $array[$key] = $builder->make($value);
                    }

                }

                return $class->{$instruction['method']}(...$array);

            }, [
                'name'     => $instruction['name']     ?? $instruction['class'],
                'position' => $instruction['position'] ?? null,
                'break'    => $instruction['break']    ?? null,
                'status'   => $instruction['status']   ?? true
            ]);

        }

    }

    return $trigger;

} catch (Exception $exception) {

    echo $exception->getMessage();

}
