<?php

return [
    'ExampleAdminController' => [
        'class' => 'example\controller\ExampleAdminController',
        'construct' => [
            ['Templater']
        ]
    ],
    'ExampleFrontController' => [
        'class' => 'example\controller\ExampleFrontController',
        'construct' => [
            ['Templater']
        ]
    ]
];
