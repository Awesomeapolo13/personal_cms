<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$router = new \App\Router();

// файл с роутами
require_once $_SERVER['DOCUMENT_ROOT'] . '/routes/web.php';

$application = new \App\Application($router);

$application->run();
