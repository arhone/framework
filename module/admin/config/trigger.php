<?php

return [
    '(http[s]?):(post|get):/admin/(.*?)' => [
        [
            'controller' => 'AdminController',
            'method'     => 'run',
            'argument'   => [0],
            'position'   => 1
        ]
    ]
];
