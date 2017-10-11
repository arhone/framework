<?php

return [
    'HTTP:GET:/404' => [
        [
            'controller' => 'HTTPStatusController',
            'method'     => 'notFound'
        ]
    ]
];