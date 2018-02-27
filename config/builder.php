<?php

$config = include __DIR__ . '/config.php';

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder'
    ],
    'CacheFile' => [
        'class' => 'arhone\cache\CacheFile',
        'construct' => [
            ['array' => [
                'status'    => $config['cache']['status'],
                'directory' =>  $config['cache']['directory']
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
            ['Cache'],
            ['array' => [
                'path' => [
                    'config' => $config['directory']['config'],
                    'module' => $config['directory']['module'],
                    'cache'  => $config['cache']['key']['config']
                ]
            ]]
        ]
    ],
    'Header' => [
        'class' => 'arhone\http\Header'
    ]
];