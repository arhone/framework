<?php

return array_merge(
    include __DIR__ . '/project/handler.php',

    include __DIR__ . '/../../module/admin/config/handler.php',
    include __DIR__ . '/../../module/front/config/handler.php',
    include __DIR__ . '/../../module/console/config/handler.php',
    include __DIR__ . '/../../module/error/config/handler.php',
    include __DIR__ . '/../../module/example/config/handler.php'
);
