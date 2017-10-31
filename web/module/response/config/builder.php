<?php

return [
    'ResponseController' => [
        'class'     => 'response\controller\ResponseController',
        'construct' => [
            ['Trigger'],
            ['Template']
        ]
    ]
];