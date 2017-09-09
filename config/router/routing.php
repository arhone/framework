<?php

return [
    '/home/(.*)/(.*)' => [
        [
            'controller' => 'moduleNewsIndexController',
            'method' => 'getContent',
            'argument' => [1,0],
            'block' => 'content'
        ],
        [],
        []
    ]
];