<?php
include __DIR__ . '/../vendor/autoload.php';

$Builder = new arhone\builder\Builder();
$Builder->instruction(include __DIR__ . '/../config/builder.php');
new arhone\cache\CacheFile();
//echo $Builder->make('Controller')->run('HTTP:GET:/');