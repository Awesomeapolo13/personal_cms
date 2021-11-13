<?php

namespace App\Controllers\Auth;

use App\Controller;
use App\Request;
use App\View\View;

/**
 * Контроллер авторизации, аутентификации и регистрации пользователей
 */
class SecurityController extends Controller
{
    /**
     * Возвращает страницу аутентификации
     *
     * @param Request $request
     * @return View
     */
    public function login(Request $request): View
    {
        /*
         * ToDo:
         *  1) Провалидировать пришедшие данные (email, password)
         *  При неудачной валидации должен выводить ошибки в не провалидированных полях, то есть надо сделать блоки
         *  ошибок в шаблоне для каждого поля.
         *  2) Определить есть ли такой пользователь
         *  3) Если есть то отправить в куки пометку что он авторизован
        */

        if (!empty($request->getBody())) {
            if ($request->getBody()['email']) {
                return new View('view.auth.login', ['title' => 'Авторизация', 'error' => '']);
            }
        }

        return new View('view.auth.login', ['title' => 'Авторизация']);
    }

    /**
     * Возвращает страницу регистрации
     *
     * @return View
     */
    public function register(): View
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