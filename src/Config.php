<?php

namespace App;

final class Config
{
    private array $configs = [];

    /**
     * Config constructor.
     * @param $configArr - имя файла с конфигурациями
     */
    public function setConfig($configArr)
    {
        $key = pathinfo($_SERVER['DOCUMENT_ROOT'] . "/configs/$configArr", PATHINFO_FILENAME);
        $this->configs[$key] = require $_SERVER['DOCUMENT_ROOT'] . "/configs/$configArr";
    }

    /**
     * Достает указанную конфигурацию из локального свойства
     *
     * @param string $config - конфигурация, которую необходимо найти
     * @param $default - значение возврщаемое в случае неудачи
     * @return array|mixed|null - искомая конфигурация или $default
     */
    public function get(string $config, $default = null)
    {
        return array_get($this->configs, $config, $default);
    }


    /** @var Config */
    private static $instance;

    public static function getInstance(): Config
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}


}
