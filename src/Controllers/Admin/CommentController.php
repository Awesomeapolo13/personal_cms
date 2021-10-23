<?php

namespace App\Controllers\Admin;

use App\ResourceController;
use App\View\View;

class CommentController extends ResourceController
{
    public function index()
    {
        return new View('view.admin.comments', ['title' => 'Управление комментариями']);
    }
}
