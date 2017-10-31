<?php

return [
    'FrontController' => [
        'class'     => 'front\controller\FrontController',
        'construct' => [
            ['Trigger'],
            ['Template']
        ]
    ]
];