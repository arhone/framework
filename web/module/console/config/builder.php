<?php

return [
    'ConsoleHelpController' => [
        'class' => 'console\controller\ConsoleHelpController',
        'construct' => [
            ['Cache']
        ]
    ],
    'ConsoleCacheController' => [
        'class' => 'console\controller\ConsoleCacheController',
        'construct' => [
            ['Cache']
        ]
    ]
];