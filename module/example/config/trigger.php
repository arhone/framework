<?php

return [
    '(http[s]?):get:/admin/' => [
        [
            'class'  => 'ExampleAdminController',
            'method' => 'middleware'
        ]
    ],
    '(http[s]?):get:/' => [
        [
            'class'  => 'ExampleFrontController',
            'method' => 'middleware'
        ]
    ]
];
