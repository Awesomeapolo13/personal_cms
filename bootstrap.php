<?php

require $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';

define('APP_DIR', '/');
define('VIEW_DIR', 'view');

require __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader( $_SERVER['DOCUMENT_ROOT'] . '/view');
$twig = new \Twig\Environment($loader);
