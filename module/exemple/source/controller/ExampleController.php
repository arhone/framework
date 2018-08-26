<?php declare(strict_types=1);
namespace exemple\controller;

use arhone\template\Template;

/**
 * Class ExampleController
 * @package exemple\controller
 */
class ExampleController {

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
