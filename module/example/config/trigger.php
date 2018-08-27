<?php

return [
    [
        'pattern'    => '(http[s]?):get:/admin',
        'controller' => 'ExampleAdminController',
        'method'     => 'middleware',
        'argument'   => [0],
        'break'      => false
    ],
    [
        'pattern'    => '(http):get:/',
        'controller' => 'ExampleFrontController',
        'method'     => 'middleware',
        'argument'   => [0]
    ]
];
