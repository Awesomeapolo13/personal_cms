<?php
namespace App;

use Illuminate\Support\Facades\App;
use App\View\View;
use App\Exception\BadMethodCallException;

/**
 * Основной класс контроллера
 */
class Controller
{
    public function __call($method, $parameters)
    {
        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }
}
