<?php

return [
    'ResponseController' => [
        'class'     => 'response\controller\ResponseController',
        'construct' => [
            ['Header'],
            ['Trigger'],
            ['Template'],
            [
                'array' => include __DIR__ . '/config.php'
            ]
        ]
    ]
];