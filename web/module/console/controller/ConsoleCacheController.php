<?php
namespace console\controller;

use arhone\cache\Cache;

/**
 * Class ConsoleCacheController
 * @package console\controller
 */
class ConsoleCacheController {

    protected $Cache;

    /**
     * ConsoleCacheController constructor.
     * @param Cache $Cache
     */
    public function __construct (Cache $Cache) {

        $this->Cache = $Cache;

    }

    /**
     * Console cache-clear
     *
     * Очищает кеш командой
     * @return bool
     */
    public function cacheClear () {

        return ($this->Cache->clear() == true ? 'Кэш очищен' : 'Кэш не был очищен') . PHP_EOL;

    }

}