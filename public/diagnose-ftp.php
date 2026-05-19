<?php
header('Content-Type: text/plain');

if (($_GET['token'] ?? '') !== 'bPXwtuggH5qk81') {
    http_response_code(403);
    die('Unauthorized');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');
    if (file_put_contents(__DIR__ . '/ftp-diagnostics.txt', $data) !== false) {
        echo "Diagnostics logged successfully!";
    } else {
        echo "Failed to write diagnostics file.";
    }
    exit;
}

echo "Send a POST request to log diagnostics.";
