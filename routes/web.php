<?php

$router->get('/', [App\Controller::class, 'index']);

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
