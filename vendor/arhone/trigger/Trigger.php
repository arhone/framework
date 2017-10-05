<?php declare(strict_types = 1);
namespace arhone\trigger;

/**
 * Триггер
 *
 * Class Trigger
 * @package arhone\trigger
 */
class Trigger {

    /**
     * Конфигурация класса
     *
     * @var array
     */
    protected static $config = [];

    /**
     * Обработчики
     *
     * @var array
     */
    protected static $handler = [];

    /**
     * Trigger constructor.
     *
     * @param array $config
     */
    public function __construct (array $config = []) {

        $this->config($config);

    }

    /**
     * Добавляет обработчик
     * 
     * @param $action
     * @param callable $callback
     * @param bool $break
     */
    public function handler ($action, callable $callback, bool $break = false) {

        self::$handler[$action][] = [
            'callback' => $callback,
            'break'    => $break
        ];

    }

    /**
     * Запуск обработчиков события
     * 
     * @param $action
     * @param null $data
     * @return null
     */
    public function event ($action, $data = null) {

        foreach (self::$handler as $key => $handlerList) {

            if (preg_match('~^' . $key . '$~ui', $action, $match)) {

                foreach ($handlerList as $handler) {

                    $data = $handler['callback']->__invoke($match, $data);
                    
                    if ($handler['break'] && $data !== null) {

                        return $data;

                    }
                    
                }

            }

        }

        return $data;

    }

    /**
     * Метод для конфигурации класса
     *
     * @param array $config
     */
    public function config (array $config) {

        self::$config = array_merge(self::$config, $config);

    }

}