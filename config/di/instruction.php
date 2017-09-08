<?php

return [
    'Router' => [
        'require' => __DIR__ . '/../vendor/arhone/router/Router.php',
        'class'   => 'arhone\router\Router',
        'method'  => [
            'routing' => [
                [
                    'array' => include __DIR__ . '/../router/routing.php'
                ],
                ['Test'],
                [
                    'class' => 'Test'
                ]
            ]
        ],
        'clone'   => true
    ],
    'Test' => ['Test1'],
    'Test1' => ['Callback'],
    'String' => [
        'string' => 'строка'
    ],
    'Integer' => [
        'integer' => '123'
    ],
    'Object' => [
        'object' => ['объект']
    ],
    'Array' => [
        'array' => ['массив']
    ],
    'Callback' => [
        'callback' => function () {return 'обратный вызов';}
    ],
    'Callable' => [
        'callable' => function () {return 'функция';}
    ]
];