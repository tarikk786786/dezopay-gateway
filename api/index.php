<?php
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

if ($path === '/' || $path === '') {
    $path = '/index.php';
}

$file = realpath(__DIR__ . '/..' . $path);

// Security: Prevent directory traversal outside the app root
$base = realpath(__DIR__ . '/..');
if ($file && strpos($file, $base) === 0 && is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
    // We need to set the working directory so relative includes in the script work properly
    chdir(dirname($file));
    require $file;
} else {
    http_response_code(404);
    echo "404 Not Found";
}
