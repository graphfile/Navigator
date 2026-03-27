<?php
// new_file.php
$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['path'])) {
    http_response_code(400);
    echo "No path provided";
    exit;
}

$path = trim($data['path'], '/'); // file name only

if (file_exists($path)) {
    echo "File already exists";
    exit;
}

// Create an empty file
if (file_put_contents($path, "") !== false) {
    echo "File created";
} else {
    http_response_code(500);
    echo "Failed to create file";
}
?>
