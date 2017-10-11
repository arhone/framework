<?php
namespace console\controller;

use arhone\cache\Cache;

/**
 * Class ConsoleController
 * @package console\controller
 */
class ConsoleController {

    protected $Cache;

    /**
     * ConsoleController constructor.
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

        return $this->Cache->clear();

    }

}