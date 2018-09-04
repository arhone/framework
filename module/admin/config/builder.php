<?php

return [
    'AdminController' => [
        'class'     => 'admin\controller\AdminController',
        'construct' => [
            ['Trigger'],
            ['Templater'],
            [
                'array' => include __DIR__ . '/config.php'
            ]
        ]
    ]
];
