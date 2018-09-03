<?php

return [
    [
        'pattern'  => '(http[s]?):(post|get):/(?!admin|api)(.*)',
        'class'    => 'FrontController',
        'method'   => 'run',
        'argument' => [0],
        'position' => 1
    ]
];
