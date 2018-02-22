<?php declare(strict_types=1);
namespace hello_world\library\controller;

use arhone\header\Header;
use arhone\template\Template;

class HelloWorldController {

    protected $Header;
    protected $Template;

    public function __construct (Header $Header, Template $Template) {

        $this->Header   = $Header;
        $this->Template = $Template;

    }

    public function middleware ($data) {

        $this->Template->title   = 'Заголовок страницы';
        $this->Template->content = 'Тестовое содержимое';

        return $data . 'Привет';

    }

}
