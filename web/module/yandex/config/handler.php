<?php

return [
    'HTTP:GET:/yandex/(news)' => [
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [1],
            'block'      => 'content'
        ],
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [1],
            'block'      => 'title'
        ]
    ]
];