<?php
// Router for PHP built-in server: serve static files if they exist, otherwise route to index.php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = __DIR__ . $uri;
if ($uri !== '/' && file_exists($path) && !is_dir($path)) {
    return false; // let the built-in server serve the file
}
require_once __DIR__ . '/index.php';
