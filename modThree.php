<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\ModThree;

$input = $argv[1] ?? null;

if ($input === null || preg_match('/[^01]/', $input)) {
    echo "Usage: php modThree.php <binary_string>\n";
    exit(1);
}

$modThree = new ModThree();
echo $modThree->run($input) . "\n";
