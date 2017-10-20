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

        $info[] = 'cache-clear, cc - Очищает весь кэш';
        $info[] = 'help, h - Выводит подсказку';

        return implode(PHP_EOL, $info) . PHP_EOL;

    }

}