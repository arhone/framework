<?php

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder'
    ],
    'Cache' => [
        'class' => 'arhone\cache\CacheFile',
        'construct' => [
            ['array' => [
                'status'    => true,
                'directory' => __DIR__ . '/../cache'
            ]]
        ]
    ],
    'Trigger' => [
        'class' => 'arhone\trigger\Trigger'
    ],
    'Template' => [
        'class' => 'arhone\template\Template'
    ],
    'Controller' => [
        'class' => 'arhone\controller\Controller',
        'construct' => [
            ['Builder'],
            ['Cache'],
            ['Trigger'],
            ['Template'],
            ['array' => [
                'directory' => [
                    'config'    => __DIR__ . '/../web/config',
                    'extension' => __DIR__ . '/../web/extension',
                    'library'   => __DIR__ . '/../web/library',
                    'module'    => __DIR__ . '/../web/module',
                    'template'  => __DIR__ . '/../web/template',
                ]
            ]]
        ]
    ]
];