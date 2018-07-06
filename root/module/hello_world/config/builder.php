<?php

return [
    'HelloWorldController' => ['HelloWorldControllerExtension'],
    'HelloWorldControllerExtension' => [
        'class' => 'hello_world\controller\HelloWorldControllerExtension',
        'construct' => [
            ['Template']
        ]
    ]
];