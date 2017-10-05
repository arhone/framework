<?php
/**
 * @var $Trigger arhone\trigger\Trigger
 */
?>
<html>
<head>
    <title><?=$title ?? 'Сайт'?></title>
</head>
<body>
    <?=$Trigger->event('ad')?>
    <?=$this->content ?? ''?>
</body>
<footer>
    <?=$footer ?? ''?>
</footer>
</html>