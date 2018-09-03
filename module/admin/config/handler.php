<?php

return [
    [
        'pattern'  => '(http[s]?):(post|get):/admin(/(.*))?',
        'class'    => 'AdminController',
        'method'   => 'run',
        'argument' => [0],
        'position' => 1
    ]
];
