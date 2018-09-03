<?php

return [
    [
        'pattern' => 'console:(--help|-h)?',
        'class'   => 'ConsoleHelpController',
        'method'  => 'help'
    ],
    [
        'pattern' => 'console:(cache:clear)',
        'class'   => 'ConsoleCacheController',
        'method'  => 'clear'
    ],
    [
        'pattern' => 'console:(symlink:create)',
        'class'   => 'ConsoleSymlinkController',
        'method'  => 'create'
    ],
    [
        'pattern'  => 'console:test',
        'class'    => 'ConsoleHelpController',
        'method'   => 'test',
        'argument' => ['Trigger']
    ]
];
