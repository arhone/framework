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