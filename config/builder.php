<?php

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder'
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
    'Config' => [
        'class' => 'arhone\config\Config'
    ],
    'Template' => [
        'class' => 'arhone\template\Template'
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