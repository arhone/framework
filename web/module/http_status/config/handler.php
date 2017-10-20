<?php

return [
    'HTTP:GET:/(0|404)' => [
        [
            'controller' => 'HTTPStatusController',
            'method'     => 'code',
            'argument'   => [1]
        ]
    ]
];