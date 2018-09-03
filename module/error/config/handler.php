<?php

return [
    [
        'trigger'  => '(http[s]?):(.*):/error/code/([0-9]+)',
        'class'    => 'ErrorController',
        'method'   => 'code',
        'argument' => [1, 3],
        'position' => -1,
        'break'    => true
    ]
];
