<?php

return [
    'HTTPStatusController' => [
        'class'     => 'http_status\controller\HTTPStatusController',
        'construct' => [
            ['Header'],
            ['Template']
        ]
    ]
];