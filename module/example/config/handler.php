<?php

return [
    [
        'pattern'  => '(http[s]?):get:/admin',
        'class'    => 'ExampleAdminController',
        'method'   => 'middleware',
        'argument' => [0],
        'break'    => false
    ],
    [
        'pattern'  => '(http):get:/',
        'class'    => 'ExampleFrontController',
        'method'   => 'middleware',
        'argument' => [0]
    ]
];
