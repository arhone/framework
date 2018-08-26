<?php

return [
    'ExampleController' => ['ExampleControllerExtension'],
    'ExampleControllerExtension' => [
        'class' => 'example\controller\ExampleControllerExtension',
        'construct' => [
            ['Template']
        ]
    ]
];
