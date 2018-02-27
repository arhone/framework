<?php declare(strict_types=1);
namespace response\controller;
use arhone\header\HeaderInterface;
use arhone\template\TemplateInterface;
use arhone\trigger\TriggerInterface;

class ResponseController {

    protected $config = [
        'tag'  => 'content', // Главный тег
        'path' => [
            'template' => __DIR__ . '/../../../template/default/index.tpl'
        ]
    ];

    protected $Header;
    protected $Trigger;
    protected $Template;

    /**
     * ResponseController constructor.
     *
     * @param HeaderInterface $Header
     * @param TriggerInterface $Trigger
     * @param TemplateInterface $Template
     * @param array $config
     */
    public function __construct (HeaderInterface $Header, TriggerInterface $Trigger, TemplateInterface $Template, array $config = []) {

        $this->Header   = $Header;
        $this->Trigger  = $Trigger;
        $this->Template = $Template;

        $this->config($config);

    }

    /**
     * @param $data
     * @return string
     */
    public function run ($data) {

        $this->Header->send();

        if ($this->Template->has($this->config['tag'])) {

            return $this->Template->render($this->config['path']['template']);

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