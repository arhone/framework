<?php

return [
    [
        'pattern'    => '(http[s]?):(post|get):/admin(/(.*))?',
        'controller' => 'AdminController',
        'method'     => 'run',
        'argument'   => [0],
        'position'   => 1
    ]
];
