<?php

return [
    'HTTPStatusController' => [
        'class'     => 'http_status\library\controller\HTTPStatusController',
        'construct' => [
            ['Header'],
            ['Template']
        ]
    ]
];