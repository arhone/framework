<?php
namespace console\controller;

use arhone\cache\Cache;

/**
 * Class ConsoleHelpController
 * @package console\controller
 */
class ConsoleHelpController {

    protected $Cache;

    /**
     * ConsoleHelpController constructor.
     * @param Cache $Cache
     */
    public function __construct (Cache $Cache) {

        $this->Cache = $Cache;

    }

    /**
     * Выводи информацию у консоле
     */
    public function help () {

        $info = 'cache-clear - Очищает весь кеш' . PHP_EOL;
        $info = 'help - Выводит подсказку' . PHP_EOL;

        return $info;

    }

}