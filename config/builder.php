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
            ['Cache'],
            ['Trigger'],
            ['Tpl']
        ]
    ],
    'Controller' => [
        'require' => __DIR__ . '/../vendor/arhone/framework/Controller.php',
        'class' => 'arhone\framework\Controller',
        'construct' => [
            ['Model'],
            ['Builder'],
            ['Cache'],
            ['Trigger'],
            ['Tpl'],
            ['array' => [
                'directory' => [
                    'extension' => __DIR__ . '/../web/extension',
                    'library'   => __DIR__ . '/../web/library',
                    'module'    => __DIR__ . '/../web/module',
                    'template'  => __DIR__ . '/../web/template',
                ]
            ]]
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