<?php declare(strict_types=1);

namespace console\controller;

/**
 * Class ConsoleSymlinkController
 * @package console\controller
 */
class ConsoleSymlinkController {

    /**
     * Console symlink:create
     *
     * Очищает кеш командой
     * @return bool
     */
    public function create () {

        $linkList = [];

        // Создание символических ссылок
        foreach (include __DIR__ . '/../../../../config/arhone/symlink.php' as $target => $link) {

            $target = str_replace('/', '\\', $target);
            $link   = str_replace('/', '\\', $link);

            if (file_exists($target) && !file_exists($link)) {
                symlink($target, $link);
                $linkList[] = $link;
            }

        }

        return implode(PHP_EOL, $linkList) . PHP_EOL;

    }

}
