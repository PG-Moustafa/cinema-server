<?php

$base_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base_dir = strtolower($base_dir);
$request_txt = strtolower(substr($request, 0, strlen($base_dir)));

// Remove the base directory from the request if present
if ($request_txt === $base_dir) {
    $request = substr($request, strlen($base_dir));
}

// Ensure the request is at least '/'
if ($request == '') {
    $request = '/';
}

$apis = require 'routes/api.php';

if (isset($apis[$request])) {
    $controller_name = $apis[$request]['controller'];
    $method = $apis[$request]['method'];
    require_once "controllers/{$controller_name}.php";

    $controller = new $controller_name();
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Error: Method {$method} not found in {$controller_name}.";
    }
} else {
    echo "404 Not Found";
}

