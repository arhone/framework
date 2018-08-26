<?php

return [
    'ExampleController' => ['ExampleControllerExtension'],
    'ExampleControllerExtension' => [
        'class' => 'exemple\controller\ExampleControllerExtension',
        'construct' => [
            ['Template']
        ]
    ]
];
