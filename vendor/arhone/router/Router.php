<?php declare(strict_types = 1);

namespace arhone\router;

/**
 * Маршрутизатор
 *
 * Class Router
 * @package arhone\router
 */
class Router {

    /**
     * Конфигурация класса
     *
     * @var array
     */
    protected static $config = [];

    /**
     * Настройки маршрутов
     *
     * @var array
     */
    protected static $routing = [];

    /**
     * Router constructor.
     *
     * @param array $config
     */
    public function __construct (array $config = []) {

        $this->config($config);

    }

    /**
     * Добавляет маршрут
     *
     * @param string $route
     * @param array $option
     */
    public function add (string $route, array $option) {

        self::$routing[$route][] = $option;

    }

    /**
     * Запускает события, подходящие под маршрут
     *
     * @param string $route
     * @param callable $function
     */
    public function run (string $route = '', callable $function) {

        foreach (self::$routing as $key => $optionList) {

            if (preg_match('#^' . $key . '$#ui', $route, $match)) {

                foreach ($optionList as $option) {

                    $function->__invoke($match, $option);

                }

            }

        }

    }

    /**
     * Дополняет набор маршрутов
     *
     * @param array $routing
     */
    public function routing (array $routing) {

        self::$routing = array_merge(self::$routing, $routing);

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