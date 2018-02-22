<?php

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder'
    ],
    'CacheFile' => [
        'class' => 'arhone\cache\CacheFile',
        'construct' => [
            ['array' => [
                'status'    => false,
                'directory' => __DIR__ . '/../cache'
            ]]
        ]
    ],
    'Cache' => ['CacheFile'],
    'Trigger' => [
        'class' => 'arhone\trigger\Trigger'
    ],
    'Config' => [
        'class' => 'arhone\config\Config'
    ],
    'Template' => [
        'class' => 'arhone\template\Template'
    ],
    'Session' => [
        'class' => 'arhone\session\Session'
    ],
    'Controller' => [
        'class' => 'arhone\controller\Controller',
        'construct' => [
            ['Builder'],
            ['Trigger'],
            ['Config'],
            ['Cache']
        ]
    ],
    'Header' => [
        'class' => 'arhone\http\Header'
    ]
];