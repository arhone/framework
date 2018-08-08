<?php

return [
    'directory' => [
        'config'   => __DIR__,
        'module'   => __DIR__ . '/../../module',
        'library'  => [
            'composer'     => __DIR__ . '/../../library/composer',
            'internal'     => __DIR__ . '/../../library/internal',
            'external'     => __DIR__ . '/../../library/external',
            'extension'    => __DIR__ . '/../../library/extension',
            'test'         => __DIR__ . '/../../library/test',
            'subdirectory' => ['source', 'library', 'extension', 'test']
        ],
        'log'      => __DIR__ . '/../../log',
        'cache'    => __DIR__ . '/../../cache',
        'template' => __DIR__ . '/../../public/template',
        'upload'   => __DIR__ . '/../../public/upload'
    ],
    'cache' => [
        'status'    => false,
        'directory' => __DIR__ . '/../../cache',
        'key' => [
            'config' => 'arhone:config'
        ]
    ]
];
