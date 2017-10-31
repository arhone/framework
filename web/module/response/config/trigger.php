<?php

return [
    'http:(.*)' => [
        [
            'controller' => 'ResponseController',
            'method'     => 'run',
            'argument'   => [0],
            'position'   => 1
        ]
    ]
];