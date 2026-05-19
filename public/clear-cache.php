<?php
header('Content-Type: text/plain');

$cachePath = __DIR__ . '/../bootstrap/cache';

$files = [
    'routes-v7.php',
    'config.php',
    'services.php',
    'packages.php'
];

echo "Clearing Laravel Cache Files:\n";
echo "=============================\n";

foreach ($files as $file) {
    $filePath = $cachePath . '/' . $file;
    if (file_exists($filePath)) {
        if (@unlink($filePath)) {
            echo "SUCCESS: Deleted $file\n";
        } else {
            echo "FAILED: Could not delete $file\n";
        }
    } else {
        echo "INFO: $file does not exist (already clear)\n";
    }
}

echo "=============================\n";
echo "Done! Laravel Cache Cleared.";
