<?php

function response() {
    http_response_code(200); // Set a custom status code
    return new Response(); // This should return a single instance
}

function view($instance, $data = []) {
    return $instance->view($data);
}

function path($target) {
    $path = str_replace('//', '/', "/index.php/$target");

    return APP_URL.$path;
}

function assets($target) {
    $path = str_replace('//', '/', "/assets/$target");

    return APP_URL.$path;
}

function print_log($message) {
    echo json_encode($message) . '<br>';
}

function redirect_to($target) {
    header('Location: '. path($target));

    exit;
}

function safe_text($content) {
    $allowed_tags = '<p><a><strong><em><u><i><b><img><ul><ol><li><br><hr><blockquote><code><pre><h1><h2><h3><h4><h5><h6><table><tr><th><td><thead><tbody><footer><header><span><div>';
    
    return strip_tags($content, $allowed_tags);
}