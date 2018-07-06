<?php

(include __DIR__ . '/../include/arhone/core.php')
    ->run('HTTP:' . ($_SERVER['REQUEST_METHOD'] ?? 'GET') . ':' . strtok($_SERVER['REQUEST_URI'] ?? '/', '?'));
