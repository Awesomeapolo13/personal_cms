<?php

namespace App;

use App\Exception\NotFoundException;

/**
 * Маршрутизатор
 */
class Router
{
    /**
     * @var array - массив маршрутов
     */
    public $routes = [];

    /**
     * Регистрирует запрос, обрабатываемый методом get
     *
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $newRoute = new Route('GET', preparePathToFormat($path), $callback);
        $this->routes[$newRoute->getPath()] = $newRoute;
    }

    /**
     * Регистрирует запрос, обрабатываемый методом post
     *
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        $newRoute = new Route('POST', preparePathToFormat($path), $callback);
        $this->routes[$newRoute->getPath()] = $newRoute;
    }

    /**
     * Регистрирует маршруты для всех типов запросов (CRUD)
     *
     * @param $path
     * @param $callback
     */
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

    /**
     * Проверяет маршрут и запускает его
     *
     * @return mixed
     * @throws NotFoundException
     */
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
