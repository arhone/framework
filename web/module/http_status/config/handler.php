<?php

return [
    'http:(.*):/(0|404)' => [
        [
            'controller' => 'HTTPStatusController',
            'method'     => 'code',
            'argument'   => [1, 2],
            'break'      => true
        ]
    ]
];