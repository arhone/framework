<?php

return [
    'console:(--help|-h)?' => [
        [
            'controller' => 'ConsoleHelpController',
            'method'     => 'help'
        ]
    ],
    'console:(cache:clear)' => [
        [
            'controller' => 'ConsoleCacheController',
            'method'     => 'cacheClear'
        ]
    ],
    'console:test' => [
        [
            'class'    => 'ConsoleHelpController',
            'method'   => 'test',
            'argument' => ['Trigger']
        ]
    ]
];
