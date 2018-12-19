<?php

return array_merge(
    include __DIR__ . '/develop/builder.php',

    include __DIR__ . '/../../module/admin/config/builder.php',
    include __DIR__ . '/../../module/front/config/builder.php',
    include __DIR__ . '/../../module/console/config/builder.php',
    include __DIR__ . '/../../module/error/config/builder.php',
    include __DIR__ . '/../../module/example/config/builder.php'
);
