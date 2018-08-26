<?php

return array_merge(
    include __DIR__ . '/project/config.php',

    include __DIR__ . '/../../module/admin/config/config.php',
    include __DIR__ . '/../../module/front/config/config.php',
    include __DIR__ . '/../../module/console/config/config.php',
    include __DIR__ . '/../../module/error/config/config.php',
    include __DIR__ . '/../../module/example/config/config.php'
);
