<?php

return [
    'AdminController' => [
        'class'     => 'admin\controller\AdminController',
        'construct' => [
            ['Trigger'],
            ['Template'],
            [
                'array' => include __DIR__ . '/config.php'
            ]
        ]
    ]
];
