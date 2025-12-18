<?php
// Simple minimal app that serves GET /api/name using value from .env
function load_env($path) {
    $vars = [];
    if (!is_readable($path)) return $vars;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) continue;
        if (strpos($line, '=') === false) continue;
        list($k, $v) = explode('=', $line, 2);
        $k = trim($k);
        $v = trim($v);
        if (strlen($v) >= 2 && (($v[0] === '"' && substr($v, -1) === '"') || ($v[0] === "'" && substr($v, -1) === "'"))) {
            $v = substr($v, 1, -1);
        }
        $vars[$k] = $v;
    }
    return $vars;
}

$env = load_env(__DIR__ . '/.env');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $uri === '/api/name') {
    header('Content-Type: application/json; charset=utf-8');
    if (isset($env['NAME']) && $env['NAME'] !== '') {
        echo json_encode(['name' => $env['NAME']]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'NAME not set in .env']);
    }
    exit;
}

// Simple index page
?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Name API</title>
</head>
<body>
  <h1>Name API</h1>
  <p>Call <code>/api/name</code> to get the name defined in <code>.env</code>.</p>
</body>
</html>
