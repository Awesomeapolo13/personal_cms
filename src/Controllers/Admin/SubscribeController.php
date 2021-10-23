<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\View\View;

class SubscribeController extends Controller
{
    public function index()
    {
        return new View('view.admin.subscribers', ['title' => 'Управление подписками']);
    }
}
