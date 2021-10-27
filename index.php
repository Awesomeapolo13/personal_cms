<?php

use \App\Router;
use \App\Request;
use \App\Application;

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$router = new Router();
// создаем объект запроса, передаем ему необходимые суперглобальные массивы
$request = new Request(
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES,
    $_SERVER
);

// файл с регистрируемыми маршрутами (роутами)
require_once $_SERVER['DOCUMENT_ROOT'] . '/routes/web.php';



$application = new Application($router);

$application->run();
