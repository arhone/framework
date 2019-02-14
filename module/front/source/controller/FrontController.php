<?php declare(strict_types=1);
namespace front\controller;

use arhone\templating\templater\TemplaterInterface;
use arhone\commutation\trigger\TriggerInterface;

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
     * @var TemplaterInterface
     */
    protected $Templater;

    /**
     * ResponseController constructor.
     *
     * @param TriggerInterface $Trigger
     * @param TemplaterInterface $Templater
     * @param array $config
     */
    public function __construct (TriggerInterface $Trigger, TemplaterInterface $Templater, array $config = []) {

        $this->Trigger  = $Trigger;
        $this->Templater = $Templater;

        $this->config($config);

    }

    /**
     * Запуск
     *
     * @param $data
     * @return string
     */
    public function run ($data) {

        if ($this->Templater->has($this->config['tag'])) {

            return $this->Templater->render($this->config['path']['view']);

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
