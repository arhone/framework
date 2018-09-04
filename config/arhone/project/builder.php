<?php
/**
 * @var array $config Настройки из файла config.php
 */
$config = include __DIR__ . '/config.php';

return [
    'Builder' => [
        'class' => 'arhone\builder\Builder',
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
            [
                'array' => $_SERVER,
            ],
            [
                'array' => [], //getallheaders()
            ],
            [
                'array' => $_GET,
            ],
            [
                'array' => $_POST,
            ],
            [
                'array' => $_COOKIE,
            ],
            [
                'array' => $_FILES
            ]
        ]
    ],
    'Response' => [
        'class' => 'arhone\http\Response',
        'construct' => []
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
        'class' => 'arhone\commutation\Trigger'
    ],
    'Configuration' => [
        'class' => 'arhone\storing\ContainerMemoryAdapter',
        'construct' => [
            [
                'array' => $config
            ]
        ]
    ],
    'Templater' => [
        'class' => 'arhone\templating\Templater'
    ],
    'Session' => [
        'class' => 'arhone\session\Session'
    ]
];
