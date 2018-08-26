<?php declare(strict_types=1);
namespace exemple\controller;

use arhone\template\Template;

/**
 * Class ExampleFrontController
 * @package exemple\controller
 * @author Алексей Арх <info@arh.one>
 */
class ExampleFrontController {

    /**
     * @var Template
     */
    protected $Template;

    /**
     * ExampleFrontController constructor.
     * @param Template $Template
     */
    public function __construct (Template $Template) {

        $this->Template = $Template;

    }

    /**
     * @param $data
     * @return string
     */
    public function middleware ($data) {

        $this->Template->title   = 'Пример фронт страницы';
        $this->Template->content = 'Тест фронт страницы';

        return $data . 'Привет';

    }

}
