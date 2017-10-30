<?php

return [
    '(HTTP:)(.*)' => [
        [
            'controller' => 'ViewController',
            'method'     => 'run',
            'argument'   => [1]
        ]
    ]
];