<?php

return [
    'FrontController' => [
        'class'     => 'front\controller\FrontController',
        'construct' => [
            ['Trigger'],
            ['Templater'],
            [
                'array' => include __DIR__ . '/config.php'
            ]
        ]
    ]
];
