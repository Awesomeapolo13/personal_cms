<?php
namespace App\Exception;

use App\View\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        echo 'Error 404: Страница не обнаружена';
    }
}
