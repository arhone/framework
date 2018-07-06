<?php
/**
 * @var \arhone\controller\ControllerInterface $this
 */

return [
    'console:(--help|-h)?' => [
        [
            'class'  => 'ConsoleHelpController',
            'method' => 'help'
        ]
    ],
    'console:(cache:clear)' => [
        [
            'class'  => 'ConsoleCacheController',
            'method' => 'cacheClear'
        ]
    ],
    'console:test' => [
        [
            'class'    => 'ConsoleHelpController',
            'method'   => 'test',
            'argument' => ['ConsoleCacheController']
        ]
    ]
];
