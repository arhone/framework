<?php

return [
    'POST:/(yandex)/(news)' => [
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [2],
            'blog'       => 'body'
        ],
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [1],
            'blog'       => 'title'
        ]
    ]
];