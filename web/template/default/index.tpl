<?php
/**
 * @var $this arhone\tpl\Tpl
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title><?=$this->block('title')?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <?=$this->block('head')?>
</head>
<body>
    <?=$this->block('content')?>
</body>
<footer>
    <?=$this->block('footer')?>
</footer>
</html>