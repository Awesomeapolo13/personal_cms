<?php

namespace App;

/**
 * Класс запроса
 */
class Request
{
    /**
     * Параметры из глобаного массива $_GET
     *
     * @var array
     */
    private array $query;

    /**
     * Параметры из глобаного массива $_POST
     *
     * @var array
     */
    private array $body;

    /**
     *  Параметры из глобаного массива $_COOKIE
     *
     * @var array
     */
    private array $cookies;

    /**
     *  Параметры из глобаного массива $_FILES
     *
     * @var array
     */
    private array $files;

    /**
     *  Параметры из глобаного массива $_SERVER
     *
     * @var array
     */
    private array $server;

    public function __construct(array $query = [], array $body = [], array $cookies = [], array $files = [], array $server = [])
    {
        $this->query = $query;
        $this->body = $body;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->server = $server;
    }

    /**
     * Создает экземпляр Request из суперглобальных массивов
     *
     * @return Request
     */
    public static function createFromGlobals(): Request
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getCookies(): array
    {
        return $this->cookies;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @return array
     */
    public function getServer(): array
    {
        return $this->server;
    }


}
