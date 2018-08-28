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
        'method'     => 'clear'
    ],
    [
        'pattern'    => 'console:(symlink:create)',
        'controller' => 'ConsoleSymlinkController',
        'method'     => 'create'
    ],
    [
        'pattern'  => 'console:test',
        'class'    => 'ConsoleHelpController',
        'method'   => 'test',
        'argument' => ['Trigger']
    ]
];
