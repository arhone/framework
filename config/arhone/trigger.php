<?php

return array_merge(
    include __DIR__ . '/project/trigger.php',

    include __DIR__ . '/../../module/admin/config/trigger.php',
    include __DIR__ . '/../../module/front/config/trigger.php',
    include __DIR__ . '/../../module/console/config/trigger.php',
    include __DIR__ . '/../../module/error/config/trigger.php',
    include __DIR__ . '/../../module/example/config/trigger.php'
);
