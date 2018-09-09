<?php declare(strict_types=1);

namespace example\controller;

use arhone\templating\Templater;

/**
 * Class ExampleAdminController
 * @package example\controller
 * @author Алексей Арх <info@arh.one>
 */
class ExampleAdminController {

    /**
     * @var Templater
     */
    protected $Templater;

    /**
     * ExampleAdminController constructor.
     * @param Templater $Templater
     */
    public function __construct (Templater $Templater) {

        $this->Templater = $Templater;

    }

    /**
     * @param $data
     * @return string
     */
    public function middleware ($data) {

        $this->Templater->title   = 'Пример админка';
        $this->Templater->content = 'Тест админка';

        return $data . 'Привет';

    }

}
