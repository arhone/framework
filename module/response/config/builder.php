<?php

return [
    'ResponseController' => [
        'class'     => 'response\controller\ResponseController',
        'construct' => [
            ['Trigger'],
            ['Template'],
            [
                'array' => include __DIR__ . '/config.php'
            ]
        ]
    ]
];