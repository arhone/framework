<?php
/**
 * @var array $config Настройки из файла config.php
 */
$config = include __DIR__ . '/config.php';

return [
    'Builder' => [
        'class' => 'arhone\construction\builder\Builder',
        'construct' => [
            'new'   => false,
            'clone' => true
        ]
    ],
    'Http' => [
        'class' => 'arhone\http\Http',
        'construct' => [
            ['Request'],
            ['Response']
        ]
    ],
    'Request' => [
        'class' => 'arhone\http\Request',
        'construct' => [
            ['array' => $_SERVER],
            ['array' => [] /*getallheaders()*/],
            ['array' => $_GET],
            ['array' => $_POST],
            ['array' => $_COOKIE],
            ['array' => $_FILES]
        ]
    ],
    'Response' => [
        'class' => 'arhone\http\Response',
        'construct' => []
    ],
    'CacherFile' => [
        'class' => 'arhone\caching\cacher\CacherFileSystemAdapter',
        'construct' => [
            ['array' => [
                'status'    => $config['cache']['status'],
                'directory' =>  $config['cache']['directory']
            ]]
        ]
    ],
    'Cacher' => ['CacherFile'],
    'Trigger' => [
        'class' => 'arhone\commutation\trigger\Trigger'
    ],
    'Config' => [
        'class' => 'arhone\storing\StorageMemoryAdapter',
        'method' => [
            'fill' => [
                ['array' => $config]
            ]
        ]
    ],
    'Templater' => [
        'class' => 'arhone\templating\templater\Templater'
    ],
    'Session' => [
        'class' => 'arhone\session\Session'
    ]
];
