<?php
use arhone\di\DI as DI;
include __DIR__ . '/../vendor/autoload.php';

//$DI = new DI();
//$DI->instruction(include __DIR__ . '/../config/di/instruction.php');

class Tpl {
    public function get ($tpl) {
        return $tpl;
    }
}

class App {
    public function __construct(\Tpl $Tpl, \Service $Service) {
        $this->Tpl     = $Tpl;
        $this->Service = $Service;
    }
    public function run () {
        echo $this->Service->getIndex();
    }
}

class Service {
    public function __construct(\Tpl $Tpl) {
        $this->Tpl = $Tpl;
    }
    public function getIndex() {
        return $this->Tpl->get('Ура');
    }
}

DI::make([
    'class' => 'App',
    'construct' => [
        [
            'class' => 'Tpl'
        ],
        [
            'class' => 'Service',
            'construct' => [
                [
                    'class' => 'Tpl'
                ]
            ]
        ]
    ],
    'method' => [
        'run' => []
    ]
]);