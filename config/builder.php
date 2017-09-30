<?php

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder'
    ],
    'Controller' => [
        'require' => __DIR__ . '/../vendor/arhone/framework/Controller.php',
        'class' => 'arhone\framework\Controller',
        'construct' => [
            ['Builder'],
            ['Router'],
            ['Tpl']
        ]
    ],
    'Tpl' => [
        'class' => 'arhone\tpl\Tpl'
    ],
    'Router' => [
        'class' => 'arhone\router\Router'
    ]
];