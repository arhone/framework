<?php
namespace console\controller;

use arhone\trigger\Trigger;

/**
 * Class ConsoleHelpController
 * @package console\controller
 */
class ConsoleHelpController {

    /**
     * Выводи информацию у консоле
     */
    public function help () {

        $info[] = 'Arhone (develop: ' . (defined('DEVELOP') ?  "\033[32m" . 'true' : "\033[31m" . 'false')  . "\033[37m" . ', test: ' . (defined('TEST') ? "\033[32m" . 'true' : "\033[31m" . 'false') . "\033[37m" . ')';
        $info[] = '';
        $info[] = "\033[32m" . ' -h, --help       ' . "\033[37m". '- Выводит подсказку';
        $info[] = "\033[32m" . ' -d, --develop    ' . "\033[37m". '- Добавляет в проект константу DEVELOP (arh cron -d)';
        $info[] = "\033[32m" . ' -t, --test       ' . "\033[37m". '- Добавляет в проект константу TEST';
        $info[] = '';
        $info[] = "\033[33m" . '# команды';
        $info[] = "\033[32m" . ' cron             ' . "\033[37m". '- Для запуска кода по расписанию (arh cron (1h, 1D, 1W, 1M, 1Y) / arh module_name cron)';
        $info[] = "\033[32m" . ' cache:clear      ' . "\033[37m". '- Очищает весь кэш';

        return implode(PHP_EOL, $info) . PHP_EOL;

    }

    public function test (Trigger $Trigger) {

        print_r($Trigger->plan('http:get:/admin/'));exit;

    }

}
