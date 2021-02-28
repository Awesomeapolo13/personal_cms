<?php

namespace App;

use App\Exception\HttpException;
use App\Exception\NotFoundException;

class Router
{
    public $routes = [];

    public function get($path, $callback)
    {
        $newRoute = new Route('GET', preparePathToFormat($path), $callback);
        $this->routes[$newRoute->getPath()] = $newRoute;
    }

    public function post($path, $callback)
    {
        $newRoute = new Route('POST', preparePathToFormat($path), $callback);
        $this->routes[$newRoute->getPath()] = $newRoute;
    }

    public function dispatch()
    {
        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $currentHTTPMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {
            if ($route->match($currentHTTPMethod, $currentPath)) {
                return $route->run($currentPath);
            }
        }

        throw new NotFoundException();

    }
}
