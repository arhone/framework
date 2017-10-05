<?php
include __DIR__ . '/../vendor/autoload.php';

$Builder = new arhone\builder\Builder(include __DIR__ . '/../config/builder/config.php');
$Builder->instruction(include __DIR__ . '/../config/builder/instruction.php');

echo $Builder->make('Controller')->run($_REQUEST['uri'] ?? '/');

class Test {

    public function get () {
        return 'Тест';
    }

}

class Alias {
    protected $Test;
    public function __construct(Test $Test) {
        $this->Test = $Test;
    }
    public function get () {
        return $this->Test->get();
    }
}

echo $Builder->make('Alias')->get();