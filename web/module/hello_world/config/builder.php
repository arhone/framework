<?php

return [
    'HelloWorldController' => [
        'class' => 'hello_world\library\controller\HelloWorldController',
        'construct' => [
            ['Header'],
            ['Template']
        ]
    ],
    'HelloWorldControllerExtension' => [
        'class' => 'module\hello_world\controller\HelloWorldControllerExtension',
        'construct' => [
            ['Header'],
            ['Template']
        ]
    ]
];