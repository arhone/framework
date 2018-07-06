<?php declare(strict_types=1);
namespace hello_world\controller;

use arhone\template\Template;

/**
 * Class HelloWorldController
 * @package hello_world\controller
 */
class HelloWorldController {

    protected $Template;

    public function __construct (Template $Template) {

        $this->Template = $Template;

    }

    public function middleware ($data) {

        $this->Template->title   = 'Заголовок страницы';
        $this->Template->content = 'Тестовое содержимое';

        return $data . 'Привет';

    }

}
