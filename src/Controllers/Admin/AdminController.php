<?php


namespace App\Controllers\Admin;


use App\View\View;

class AdminController extends \App\Controller
{
    public function index()
    {
        return new View('view.admin.index', ['title' => 'Админка']);
    }
}