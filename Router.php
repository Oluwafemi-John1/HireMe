<?php

class Router {
    private $routes = [];
    // Register routes
    public function add($method, $path, $callback) {
        $this->routes[] = compact('method', 'path', 'callback');
        // print_r($this->routes);
    }

    // Process all route requests from the frontend
    public function dispatch($method, $path) {
        foreach ($this->routes as $route) {
            if($method === $route['method'] && $path === $route['path']) {
                return call_user_func($route['callback']);
            }
        }
        echo json_encode(['status' => 400, 'message' => 'Route not found']);
    }
}