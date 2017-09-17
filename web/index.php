<?php
include __DIR__ . '/../vendor/autoload.php';

$Builder = new arhone\builder\Builder(include __DIR__ . '/../config/builder/config.php');
$Builder->instruction(include __DIR__ . '/../config/builder/instruction.php');

echo $Builder->make('Controller')->run($_REQUEST['uri'] ?? '/');