<?php declare(strict_types=1);

namespace example\controller;

use arhone\templating\templater\TemplaterInterface;
use arhone\caching\cacher\CacherInterface;

/**
 * Class ExampleFrontController
 * @package example\controller
 * @author Алексей Арх <info@arh.one>
 */
class ExampleFrontController {

    /**
     * @var TemplaterInterface
     */
    protected $Templater;

    /**
     * @var CacherInterface
     */
    protected $Cacher;

    /**
     * ExampleFrontController constructor.
     * @param TemplaterInterface $Templater
     * @param CacherInterface $Cacher
     */
    public function __construct (TemplaterInterface $Templater, CacherInterface $Cacher) {

        $this->Templater = $Templater;
        $this->Cacher    = $Cacher;

    }

    /**
     * @param $data
     * @return string
     */
    public function middleware ($data) {

        $this->Templater->title   = 'Пример фронт страницы';

        if (!$view = $this->Cacher->get('example:front')) {
            $view = $this->Templater->render(__DIR__ . '/../view/example.tpl');
            $this->Cacher->set('example:front', $view, 120);
        }

        $this->Templater->content = $view;

        return $data;

    }

}
