<?php
namespace App\Exception;

use App\RenderInterface;

class NotFoundException extends HttpException implements RenderInterface
{
    public function render()
    {
        echo 'Error 404: Страница не обнаружена';
    }
}
