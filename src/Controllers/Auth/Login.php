<?php


namespace App\Controllers\Auth;

use App\View\View;

class Login extends \App\Controller
{
    public function index()
    {
        return new View('view.auth.login', ['title' => 'Авторизация']);
    }
}