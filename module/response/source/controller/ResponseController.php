<?php declare(strict_types=1);
namespace response\controller;

use arhone\template\TemplateInterface;
use arhone\trigger\TriggerInterface;

class ResponseController {

    protected $config = [
        'tag'  => 'content', // Главный тег
        'path' => [
            'view' => __DIR__ . '/../../../../view/view/index.tpl'
        ]
    ];

    protected $Http;
    protected $Trigger;
    protected $Template;

    /**
     * ResponseController constructor.
     *
     * @param TriggerInterface $Trigger
     * @param TemplateInterface $Template
     * @param array $config
     */
    public function __construct (TriggerInterface $Trigger, TemplateInterface $Template, array $config = []) {

        $this->Trigger  = $Trigger;
        $this->Template = $Template;

        $this->config($config);

    }

    /**
     * @param $data
     * @return string
     */
    public function run ($data) {

        //$this->Http->Response->send();

        if ($this->Template->has($this->config['tag'])) {

            return $this->Template->render($this->config['path']['view']);

        } elseif ($data) {

            return $data;

        }

        return $this->Trigger->run('http:get:/404');

    }

    /**
     * Задаёт конфигурацию
     *
     * @param array $config
     */
    public function config (array $config) {

        $this->config = array_merge($this->config, $config);

    }

}
