<?php

return [
    [
        'trigger'  => '(http[s]?):get:/admin',
        'class'    => 'ExampleAdminController',
        'method'   => 'middleware',
        'argument' => [0],
        'break'    => false
    ],
    [
        'trigger'  => '(http):get:/',
        'class'    => 'ExampleFrontController',
        'method'   => 'middleware',
        'argument' => [0]
    ]
];
