<?php

return [
    'ConsoleHelpController' => [
        'class' => 'console\library\controller\ConsoleHelpController'
    ],
    'ConsoleCacheController' => [
        'class' => 'console\library\controller\ConsoleCacheController',
        'construct' => [
            ['Cache']
        ]
    ]
];
