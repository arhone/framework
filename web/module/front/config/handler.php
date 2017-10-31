<?php

return [
    'http:(.*)' => [
        [
            'controller' => 'FrontController',
            'method'     => 'view',
            'argument'   => [0],
            'position'   => 1
        ]
    ]
];