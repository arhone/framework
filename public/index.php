<?php

(include __DIR__ . '/../include/arhone/core.php')->run(
    ($_SERVER['SERVER_PROTOCOL'] ?? '-')
    . ':' . ($_SERVER['REQUEST_METHOD'] ?? '-')
    . ':' . strtok($_SERVER['REQUEST_URI'] ?? '/', '?')
);
