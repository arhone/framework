<?php declare(strict_types=1);

namespace exemple\controller;

use arhone\template\Template;

/**
 * Class ExampleAdminController
 * @package exemple\controller
 * @author Алексей Арх <info@arh.one>
 */
class ExampleAdminController {

    /**
     * @var Template
     */
    protected $Template;

    /**
     * ExampleAdminController constructor.
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

        $this->Template->title   = 'Пример админка';
        $this->Template->content = 'Тест админка';

        return $data . 'Привет';

    }

}
