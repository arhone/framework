<?php

return [
    'Router' => [
        'type'   => 'class',
        'return' => [
            'require'   => __DIR__ . '/../vendor/arhone/router/Router.php',
            'name'      => 'arhone\router\Router',
            'construct' => [
                [
                    'type'   => 'array',
                    'return' => include 'routing.php'
                ]
            ]
        ]
    ]
];