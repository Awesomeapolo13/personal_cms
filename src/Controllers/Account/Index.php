<?php


namespace App\Controllers\Account;


use App\View\View;

class Index extends \App\Controller
{
    public function index()
    {
        return new View('view.account.index', ['title' => 'Личный кабинет']);
    }
}