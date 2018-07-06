<?php
/**
 * @var \arhone\builder\BuilderInterface $Builder Сборщик пакетов
 */

$Trigger = $Builder->make([
    'alias' => 'Trigger'
]);

include __DIR__ . '/../../root/module/console/config/trigger.php';
include __DIR__ . '/../../root/module/hello_world/config/trigger.php';
include __DIR__ . '/../../root/module/http_status/config/trigger.php';
include __DIR__ . '/../../root/module/response/config/trigger.php';

return $Trigger;
