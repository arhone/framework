<?php

return [
    'ViewController' => [
        'class' => 'view\controller\ViewsController',
        'construct' => [
            ['Tpl'],
            'template' => __DIR__ . '/../template/front/index.tpl'
        ]
    ]
];