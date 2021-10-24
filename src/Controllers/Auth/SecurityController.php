<?php

namespace App\Controllers\Auth;

use App\Controller;
use App\View\View;

/**
 * Контроллер авторизации, аутентификации и регистрации пользователей
 */
class SecurityController extends Controller
{
    /**
     * Возвращает страницу аутентификации
     *
     * @return View
     */
    public function login()
    {
        return new View('view.auth.login', ['title' => 'Авторизация']);
    }

    /**
     * Возвращает страницу регистрации
     *
     * @return View
     */
    public function register()
    {
        return new View('view.auth.register', ['title' => 'Регистрация']);
    }

    /**
     * Выходит из профиля
     *
     * @return View
     */
    public function logout()
    {
        return new View('view.auth.login', ['title' => 'Авторизация']);
    }
}