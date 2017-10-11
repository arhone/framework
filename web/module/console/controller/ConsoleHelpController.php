<?php
namespace console\controller;

/**
 * Class ConsoleHelpController
 * @package console\controller
 */
class ConsoleHelpController {

    /**
     * Выводи информацию у консоле
     */
    public function help () {

        $info = 'cache-clear - Очищает весь кеш' . PHP_EOL;
        $info = 'help - Выводит подсказку' . PHP_EOL;

        return $info;

    }

}