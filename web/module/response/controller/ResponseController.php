<?php declare(strict_types=1);
namespace response\controller;
use arhone\template\TemplateInterface;
use arhone\trigger\TriggerInterface;

class ResponseController {

    protected $config = [
        'path' => [
            'template' => __DIR__ . '/../../../template/default/index.tpl'
        ]
    ];

    protected $Trigger;
    protected $Template;

    /**
     * ResponseController constructor.
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
    public function run ($data) {

        if (!$data) {

            return $this->Trigger->run('http:get:/404');

        }

        if ($this->Template->has('content')) {
print_r($this->Template->render($this->config['path']['template']));
            return 1;

        } else {

            return $data;

        }


    }

}