<?php

namespace App\Controllers\Admin;

use App\ResourceController;
use App\View\View;

class ArticleController extends ResourceController
{
    public function index()
    {
        return new View('view.admin.articles', ['title' => 'Управление статьями']);
    }
}
