<?php

return [
    'POST:/(yandex)/(news)' => [
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [2]
        ],
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [1]
        ]
    ]
];