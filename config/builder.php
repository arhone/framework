<?php

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder'
    ],
    'Model' => [
        'require' => __DIR__ . '/../vendor/arhone/framework/Model.php',
        'class' => 'arhone\framework\Model',
        'construct' => [
            ['Builder'],
            ['Router'],
            ['Tpl']
        ]
    ],
    'Controller' => [
        'require' => __DIR__ . '/../vendor/arhone/framework/Controller.php',
        'class' => 'arhone\framework\Controller',
        'construct' => [
            ['Model'],
            ['Builder'],
            ['Router'],
            ['Tpl']
        ]
    ],
    'Cache' => [
        'class' => 'arhone\cache\CacheFile'
    ],
    'Tpl' => [
        'class' => 'arhone\tpl\Tpl'
    ],
    'Trigger' => [
        'class' => 'arhone\trigger\Trigger'
    ]
];