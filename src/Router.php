<?php

class Router {

    private array $routes = [];

    public function get($uri, $callback)
    {
        $this->routes['GET'][$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routes['POST'][$uri] = $callback;
    }

    public function dispatch()
    {
        // Get the HTTP method: GET, POST, etc.
        $method = $_SERVER['REQUEST_METHOD'];

        // Get only the path part of the requested URL.
        // We don't need the query string for route matching.
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // XAMPP serves the project from /portfolio/public.
        // We remove this part so routes can use simple paths like /login.
        $basePath = '/portfolio-php/public';
        if (str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath));
        }
        
        // The home route is represented by "/".
        // If removing the base path leaves an empty string, convert it to "/".
        if ($uri === '') {
            $uri = '/';
        }

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];

            $callback();

            return;
        }

        http_response_code(404);
        echo "404 - Page Not Found";
    }
}