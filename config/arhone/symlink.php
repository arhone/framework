<?php

return array_merge(
    include __DIR__ . '/project/symlink.php',

    include __DIR__ . '/../../module/admin/config/symlink.php',
    include __DIR__ . '/../../module/front/config/symlink.php',
    //include __DIR__ . '/../../module/console/config/symlink.php',
    include __DIR__ . '/../../module/error/config/symlink.php',
    include __DIR__ . '/../../module/example/config/symlink.php'
);
