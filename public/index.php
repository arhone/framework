<?php

echo (include __DIR__ . '/../include/arhone/core.php')->run(
    ($_SERVER['REQUEST_SCHEME'] ?? '-')
    . ':' . ($_SERVER['REQUEST_METHOD'] ?? '-')
    . ':' . strtok($_SERVER['REQUEST_URI'] ?? '/', '?')
);
