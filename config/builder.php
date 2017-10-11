<?php

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder'
    ],
    'Controller' => [
        'class' => 'arhone\controller\Controller',
        'construct' => [
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
        'class' => 'arhone\cache\CacheFile',
        'construct' => [
            ['array' => [
                'status'    => false,
                'directory' => __DIR__ . '/../cache'
            ]]
        ]
    ],
    'Trigger' => [
        'class' => 'arhone\trigger\Trigger'
    ],
    'Tpl' => [
        'class' => 'arhone\tpl\Tpl'
    ]
];