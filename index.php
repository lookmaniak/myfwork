<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'framework/http/Route.php';
require 'framework/http/Response.php';
require 'framework/helpers/global_functions.php';
require 'app/configs/app.php';
require 'app/routes/web.php';

// Set the content type to JSON
//header('Content-Type: application/json');

// Allow from any origin
header('Access-Control-Allow-Origin: *');

// Allow specific methods
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, PATCH, OPTIONS');

// Allow specific headers (customize as needed)
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

function locate($path) {
    $target_path = __DIR__ .'/'. $path;
    return $target_path;
}

Route::listen();
