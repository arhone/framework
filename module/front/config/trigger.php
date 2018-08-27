<?php

return [
    [
        'pattern'    => '(http[s]?):(post|get):/(?!admin|api)(.*)',
        'controller' => 'FrontController',
        'method'     => 'run',
        'argument'   => [0],
        'position'   => 1
    ]
];
