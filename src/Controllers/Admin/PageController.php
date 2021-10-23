<?php

namespace App\Controllers\Admin;

use App\ResourceController;
use App\View\View;

class PageController extends ResourceController
{
    public function index()
    {
        return new View('view.admin.static_pages', ['title' => 'Управление статичными страницами']);
    }
}
