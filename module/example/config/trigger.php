<?php

return [
    '(http[s]?):get:/admin/' => [
        [
            'controller' => 'ExampleAdminController',
            'method'     => 'middleware',
            'argument'   => [0],
            'break'      => false
        ]
    ],
    '(http):get:/' => [
        [
            'controller' => 'ExampleFrontController',
            'method'     => 'middleware',
            'argument'   => [0]
        ]
    ]
];
