<?php

return [
    'http:(.*):/([0-9]+)' => [
        [
            'controller' => 'HTTPStatusController',
            'method'     => 'code',
            'argument'   => [1, 2],
            'break'      => true
        ]
    ]
];