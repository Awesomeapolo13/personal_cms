<?php


namespace App\Controllers\Auth;


use App\View\View;

class Register extends \App\Controller
{
    public function index()
    {
        return new View('view.auth.register', ['title' => 'Регистрация']);
    }
}