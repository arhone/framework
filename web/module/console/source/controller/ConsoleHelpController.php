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

        $info[] = '--help, -h       - Выводит подсказку';
        $info[] = '--develop, -d    - Добавляет в проект константу DEVELOP (arh cron -d)';
        $info[] = '--test, -t       - Добавляет в проект константу TEST';
        $info[] = '';
        $info[] = 'cache-clear, cc  - Очищает весь кэш';
        $info[] = 'cron             - Для запуска кода по расписанию (arh cron (1h, 1D, 1W, 1M, 1Y) / arh module_name cron)';

        return implode(PHP_EOL, $info) . PHP_EOL;

    }

    public function test (ConsoleCacheController $consoleCacheController) {

        var_dump($consoleCacheController);exit;

    }

}