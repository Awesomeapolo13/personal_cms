<?php

//$router->get('/', [App\Controller::class, 'index']);
$router->get('/', [App\Controllers\Article::class, 'index']);

$router->get('/article/*', [App\Controllers\Article::class, 'article']);
//Авторизация
$router->get('/login', [App\Controllers\Auth\Login::class, 'index']);
//Регистрация
$router->get('/register', [App\Controllers\Auth\Register::class, 'index']);
//Профиль
$router->get('/account', [App\Controllers\Account\Index::class, 'index']);

$router->get('/articles', [App\Controller::class, 'articles']);

$router->get('/products/*/', function () {
    return new App\View\View('view.products', ['title' => 'Products']);
});

$router->get('/about', function () {
    echo "<h1>About</h1>";
});

$router->get('/about2', App\Controller::class . '@about2');

$router->get('/controller', App\Controller::class . '@controller');

$router->get('/test/*/test2/*', function ($param1, $param2) {
    echo "Test page with param1=$param1 param2=$param2";
});

$router->post('/posts/', function () {
    return new App\View\View('view.posts', ['title' => 'Posts']);
});

$router->post('/products/*/', function () {
    return new App\View\View('view.products', ['title' => 'Products']);
});

$router->resource('/admin/articles', \App\ResourceController::class);
