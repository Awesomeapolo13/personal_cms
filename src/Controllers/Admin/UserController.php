<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\View\View;

class UserController extends Controller
{
    public function index()
    {
        return new View('view.admin.users', ['title' => 'Управление пользователями']);
    }
}
