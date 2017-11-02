<?php

return [
    'http:get:/hello' => [
        [
            'controller' => 'TestController',
            'method'     => 'middleware'
        ]
    ]
];