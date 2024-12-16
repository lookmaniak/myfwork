<?php

require locate('/framework/http/Request.php');

class Route {
    private static $route_collection = [];

    public static function set(Array $set) {

        foreach ($set as $key => $value) {
            $target = explode(':', $key);
            $method = strtolower($target[0]);
            $path = ltrim($target[1] ?? '');

            self::$route_collection["$method:$path"] = $value;
        }
        
    }

    public static function listen() {
        $path_info = strtolower(ltrim(isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '', '/'));
        $request_method = strtolower($_SERVER['REQUEST_METHOD']);
    
        $route_found = self::$route_collection["$request_method:$path_info"] ?? null;
    
        if (!$route_found) {
            return self::handleNotFound();
        }
    
        $instance = new $route_found[0]();
        
        $request = new Request($_SERVER);
    
        return call_user_func([$instance, $route_found[1]], $request);
    }
    
    private static function handleNotFound() {
        http_response_code(404); 
        $response = [
            'status' => 'error',
            'message' => 'Route not found'
        ];
    
        echo json_encode($response);
        exit; 
    }
}