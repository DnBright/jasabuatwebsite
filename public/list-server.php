<?php
header('Content-Type: text/plain');

echo "DIAGNOSTICS:\n";
echo "============\n";
echo "Current directory (__DIR__): " . __DIR__ . "\n";
echo "Document root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Request URI: " . $_SERVER['REQUEST_URI'] . "\n";

echo "\nFiles in current directory:\n";
echo "---------------------------\n";
if ($handle = opendir(__DIR__)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $type = is_dir(__DIR__ . '/' . $entry) ? '[DIR]' : '[FILE]';
            echo "$type $entry\n";
        }
    }
    closedir($handle);
}

echo "\nFiles in parent directory:\n";
echo "--------------------------\n";
$parent = dirname(__DIR__);
if ($handle = opendir($parent)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $type = is_dir($parent . '/' . $entry) ? '[DIR]' : '[FILE]';
            echo "$type $entry\n";
        }
    }
    closedir($handle);
}

echo "\n============================\n";
