<?php

namespace App;

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

    public function resource($path, $callback)
    {
        $newRoutes = [
            new Route('GET', preparePathToFormat($path), $callback . '@index'),
            new Route('POST', preparePathToFormat($path) . '/create', $callback . '@create'),
            new Route('POST', preparePathToFormat($path) . '/store', $callback . '@store'),
            new Route('POST', preparePathToFormat($path) . '/show/*', $callback . '@show'),
            new Route('POST', preparePathToFormat($path) . '/update/*', $callback . '@update'),
            new Route('POST', preparePathToFormat($path) . '/destroy', $callback . '@destroy'),
        ];
        foreach ($newRoutes as $route) {
            $this->routes[$route->getPath()] = $route;
        }
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
