<?php

return [
    'ResponseController' => [
        'class'     => 'response\library\controller\ResponseController',
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