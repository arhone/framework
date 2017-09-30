<html>
<head>
    <title><?=$title ?? 'Сайт'?></title>
    <?php ob_start()?>

    <?php $_head = ob_get_clean()?>
    <?=$head ?? $_head?>
</head>
<body>
    <?php $this->startBlock('body');?>

    <?=$this->getBlock('body')?>
</body>
<footer>
    <?=$footer ?? ''?>
</footer>
</html>