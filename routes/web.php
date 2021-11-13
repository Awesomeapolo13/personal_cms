<?php

$router->get('/', [App\Controllers\ArticleController::class, 'index']);

$router->get('/article/*', [App\Controllers\ArticleController::class, 'article']);
//Авторизация
$router->get('/login', [App\Controllers\Auth\SecurityController::class, 'login']);
//Регистрация
$router->get('/register', [App\Controllers\Auth\SecurityController::class, 'register']);
//Профиль
$router->get('/account', [App\Controllers\Account\IndexController::class, 'index']);
// статьи
$router->get('/articles', [App\Controller::class, 'articles']);


//Админский раздел
$router->get('/admin', [App\Controllers\Admin\AdminController::class, 'index']);
// Управление статьями
$router->get('/admin/articles', [App\Controllers\Admin\ArticleController::class, 'index']);
// Управление комментариями
$router->get('/admin/comments', [App\Controllers\Admin\CommentController::class, 'index']);
// Управление статичными страницами
$router->get('/admin/pages', [App\Controllers\Admin\PageController::class, 'index']);
// Управление подписками
$router->get('/admin/subscribers', [App\Controllers\Admin\SubscribeController::class, 'index']);
// Управление подписками
$router->get('/admin/users', [App\Controllers\Admin\UserController::class, 'index']);


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
