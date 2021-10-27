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
    public array $routes = [];

    /**
     * Регистрирует запрос, обрабатываемый методом get
     *
     * @param $path - url
     * @param $callback - функция или метод контроллера
     * @param mixed ...$params - прочие параметры, которые необходимо передать в callback
     */
    public function get($path, $callback, ...$params): void
    {
        $newRoute = new Route('GET', preparePathToFormat($path), $callback, $params);
        $this->routes[$newRoute->getPath()] = $newRoute;
    }

    /**
     * Регистрирует запрос, обрабатываемый методом post
     *
     * @param $path
     * @param $callback
     * @param mixed ...$params
     */
    public function post($path, $callback, ...$params): void
    {
        $newRoute = new Route('POST', preparePathToFormat($path), $callback, $params);
        $this->routes[$newRoute->getPath()] = $newRoute;
    }

    /**
     * Регистрирует маршруты для всех типов запросов (CRUD)
     *
     * @param $path
     * @param $callback
     * @param mixed ...$params
     */
    public function resource($path, $callback, ...$params): void
    {
        $newRoutes = [
            new Route('GET', preparePathToFormat($path), $callback . '@index', $params),
            new Route('POST', preparePathToFormat($path) . '/create', $callback . '@create', $params),
            new Route('POST', preparePathToFormat($path) . '/store', $callback . '@store', $params),
            new Route('POST', preparePathToFormat($path) . '/show/*', $callback . '@show', $params),
            new Route('POST', preparePathToFormat($path) . '/update/*', $callback . '@update', $params),
            new Route('POST', preparePathToFormat($path) . '/destroy', $callback . '@destroy', $params),
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
