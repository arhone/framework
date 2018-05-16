<?php

return [
    'directory' => [
        'config'   => __DIR__,
        'module'   => __DIR__ . '/../../web/module',
        'library'  => [
            'composer'     => __DIR__ . '/../../library/composer',
            'custom'       => __DIR__ . '/../../library/custom',
            'extension'    => __DIR__ . '/../../library/extension',
            'test'         => __DIR__ . '/../../library/test',
            'subdirectory' => ['source', 'library', 'extension', 'test']
        ],
        'log'      => __DIR__ . '/../../log',
        'cache'    => __DIR__ . '/../../cache',
        'template' => __DIR__ . '/../../web/template',
        'upload'   => __DIR__ . '/../../web/upload'
    ],
    'cache' => [
        'status'    => false,
        'directory' => __DIR__ . '/../../cache',
        'key' => [
            'config' => 'arhone.config'
        ]
    ]
];