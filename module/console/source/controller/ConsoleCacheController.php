<?php declare(strict_types=1);

namespace console\controller;

use arhone\caching\cacher\CacherInterface;

/**
 * Class ConsoleCacheController
 * @package console\controller
 */
class ConsoleCacheController {

    /**
     * @var CacherInterface
     */
    protected $Cacher;

    /**
     * ConsoleCacheController constructor.
     * @param CacherInterface $Cache
     */
    public function __construct (CacherInterface $Cacher) {

        $this->Cacher = $Cacher;

    }

    /**
     * Console cache:clear
     *
     * Очищает кеш командой
     * @return bool
     */
    public function clear () {

        return ($this->Cacher->clear() == true ? ' Кэш очищен' : ' Кэш не был очищен') . PHP_EOL;

    }

}
