<?php

return [
    'HTTP:GET:/yandex/(news)' => [
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [1],
            'block'      => 'body'
        ],
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            //'argument'   => [1],
            'block'      => 'title'
        ]
    ]
];