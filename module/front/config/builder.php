<?php

return [
    'FrontController' => [
        'class'     => 'front\controller\FrontController',
        'construct' => [
            ['Trigger'],
            ['Template'],
            [
                'array' => include __DIR__ . '/config.php'
            ]
        ]
    ]
];
