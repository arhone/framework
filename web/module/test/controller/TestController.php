<?php declare(strict_types=1);
namespace test\controller;

use arhone\template\Template;

class TestController {

    protected $Template;

    public function __construct (Template $Template) {

        $this->Template = $Template;

    }

    public function middleware ($data) {

        $this->Template->set('content', 'value');

        return $data . 'Привет';

    }

}
