<?php

return [
    [
        'pattern'    => 'console:(--help|-h)?',
        'controller' => 'ConsoleHelpController',
        'method'     => 'help'
    ],
    [
        'pattern'    => 'console:(cache:clear)',
        'controller' => 'ConsoleCacheController',
        'method'     => 'cacheClear'
    ],
    [
        'pattern'  => 'console:test',
        'class'    => 'ConsoleHelpController',
        'method'   => 'test',
        'argument' => ['Trigger']
    ]
];
