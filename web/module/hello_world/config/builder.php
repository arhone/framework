<?php

return [
    'HelloWorldController' => ['HelloWorldControllerExtension'],
    'HelloWorldControllerExtension' => [
        'class' => 'module\hello_world\controller\HelloWorldControllerExtension',
        'construct' => [
            ['Header'],
            ['Template']
        ]
    ]
];