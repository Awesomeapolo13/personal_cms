<?php


namespace App;

class Route
{
    private $method;
    private $path;
    private $callback;

    public function __construct($method, $path, $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }

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

    public function getPath()
    {
        return $this->path;
    }

    public function match($method, $uri): bool
    {
        return $this->method === $method && preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri);
    }



    public function run($uri)
    {

        return call_user_func_array($this->prepareCallback($this->callback), extractURLData($uri, $this->getPath()));
    }
}