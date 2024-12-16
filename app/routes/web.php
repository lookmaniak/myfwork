<?php

require locate('app/controllers/PostController.php');
require locate('app/controllers/PageController.php');

Route::set([
    'get:' => [PostController::class, 'index'],
    'get:about' => [PageController::class, 'about'],
    'get:posts' => [PostController::class, 'index'],
    'get:posts/modify' => [PostController::class, 'modify'],
    'post:posts/modify' => [PostController::class, 'update'],
    'get:posts/new' => [PostController::class, 'create'],
    'post:posts/new' => [PostController::class, 'insert'],
]);