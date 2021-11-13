<?php

namespace App;

use \DI\ContainerBuilder;

class Route
{
    /**
     * @var string - имя методв
     */
    private string $method;

    /**
     * @var string - url
     */
    private string $path;

    /**
     * @var callable - коллбек функция, либо массив / строка, содержащий имя контроллера и вызываемый им метод
     */
    private $callback;

    /**
     * @var array - прочие параметры пеердаваемые в контроллер
     */
    private array $params;

    public function __construct(string $method, string $path, $callback, array $params = [])
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
        $this->params = $params;
    }

    /**
     * Возвращает путь url
     *
     * @return string - url
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Подготавливает колбек функцию для ее вызова, извлекает параметры из url
     *
     * @param $callback - колбек функция
     * @return array|mixed
     */
    private function prepareCallback($callback)
    {
        if (is_string($callback)) {
            $strArr = explode('@', $this->callback);
            $controller = new $strArr[0]();
            return [$controller, $strArr[1]];
        }

        if (is_array($callback)) {
            return [new $callback[0](), $callback[1]];
        }

        return $callback;
    }

    /**
     * Валидация пути маршрута
     *
     * @param $method - метод, которым отправлены данные на текущий маршрут
     * @param $uri - маршрут
     * @return bool
     */
    public function match($method, $uri): bool
    {
        return $this->method === $method && preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri);
    }

    /**
     * Запускает колбек функцию или метод контроллера для обработки маршрута
     *
     * Первыми параметрами в метод контроллера будут попадать те, что зашифрованы в url.
     * Затем идут прочие параметры переданные при регистрации маршрута (Request или его составляющие и пр.)
     *
     * @param $uri - маршрут
     * @return false|mixed
     * @throws \Exception
     */
    public function run($uri)
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions($_SERVER['DOCUMENT_ROOT'] . "/configs/diConfig.php");
        $container = $containerBuilder->build();

        return $container->call($this->prepareCallback($this->callback), array_merge(extractURLData($uri, $this->getPath()), $this->params));
    }
}
