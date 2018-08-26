<?php

return [
    'ErrorController' => [
        'class'     => 'error\controller\ErrorController',
        'construct' => [
            ['Header'],
            ['Template']
        ]
    ]
];
