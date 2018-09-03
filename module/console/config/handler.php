<?php

return [
    [
        'trigger' => 'console:(--help|-h)?',
        'class'   => 'ConsoleHelpController',
        'method'  => 'help'
    ],
    [
        'trigger' => 'console:(cache:clear)',
        'class'   => 'ConsoleCacheController',
        'method'  => 'clear'
    ],
    [
        'trigger' => 'console:(symlink:create)',
        'class'   => 'ConsoleSymlinkController',
        'method'  => 'create'
    ],
    [
        'trigger'  => 'console:test',
        'class'    => 'ConsoleHelpController',
        'method'   => 'test',
        'argument' => ['Trigger']
    ]
];
