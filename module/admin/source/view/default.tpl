<?php
/**
 * @var arhone\template\Template $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title><?=$this->title ?? 'Панель управления'?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <?=$this->header?>
</head>
<body>
<?=$this->content?>
</body>
<footer>
    <?=$this->footer?>
</footer>
</html>
