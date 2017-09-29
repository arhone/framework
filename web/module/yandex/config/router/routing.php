<?php

return [
    '/(yandex)/(news)' => [
        [
            'controller' => 'YandexNewsController',
            'method'     => 'get',
            'argument'   => [1]
        ]
    ]
];