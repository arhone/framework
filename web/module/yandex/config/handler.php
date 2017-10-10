<?php

return [
    'HTTP:GET:/' => [
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [2],
            'block'      => 'body'
        ],
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [1],
            'block'      => 'title'
        ]
    ]
];