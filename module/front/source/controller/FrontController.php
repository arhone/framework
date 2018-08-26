<?php declare(strict_types=1);
namespace front\controller;

use arhone\template\TemplateInterface;
use arhone\trigger\TriggerInterface;

/**
 * Class FrontController
 * @package front\controller
 * @author Алексей Арх <info@arh.one>
 */
class FrontController {

    /**
     * Настройки класса
     *
     * @var array
     */
    protected $config = [
        'tag'  => 'content', // Главный тег
        'path' => [
            'view' => __DIR__ . '/../view/default.tpl'
        ]
    ];

    /**
     * @var TriggerInterface
     */
    protected $Trigger;

    /**
     * @var TemplateInterface
     */
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
     * Запуск
     *
     * @param $data
     * @return string
     */
    public function run ($data) {

        if ($this->Template->has($this->config['tag'])) {

            return $this->Template->render($this->config['path']['view']);

        }

        return $this->Trigger->run('https:get:/error/code/404');

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
