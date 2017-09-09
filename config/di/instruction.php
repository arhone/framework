<?php

$vendor = __DIR__ . '/../../vendor';
return [
    'Router' => [
        'instruction' => $vendor . '/arhone/router/config/di/instruction.php'
    ],
    'Tpl' => [
        'instruction' => $vendor . '/arhone/tpl/config/di/instruction.php'
    ],
    'Cache' => [
        'instruction' => $vendor . '/arhone/cache/config/di/instruction.php'
    ],
    'Config' => [
        'instruction' => $vendor . '/arhone/config/config/di/instruction.php'
    ],
    'return' => [
        'class' => 'arhone\tpl\Tpl',
        'construct' => [
            [
                'instruction' => 'cache/config/di/instruction.php'
            ]
        ],
        'method' => [
            'config' => [
                'pathDir' => '/template/default'
            ]
        ]
    ],
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