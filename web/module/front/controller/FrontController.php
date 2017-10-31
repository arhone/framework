<?php declare(strict_types=1);
namespace front\controller;
use arhone\template\TemplateInterface;
use arhone\trigger\TriggerInterface;

class FrontController {

    protected $Template;

    /**
     * FrontController constructor.
     *
     * @param TriggerInterface $Trigger
     * @param TemplateInterface $Template
     */
    public function __construct (TriggerInterface $Trigger, TemplateInterface $Template) {

        $this->Trigger  = $Trigger;
        $this->Template = $Template;

    }

    /**
     * @param $data
     * @return string
     */
    public function view ($data) {

        if (!$data) {

            return $this->Trigger->run('http:get:404');

        }

        return $data;

    }

}