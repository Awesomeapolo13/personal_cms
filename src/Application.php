<?php

namespace App;

use App\View\Renderable;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    public $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    /**
     * Запускает работу приложения
     *
     */
    public function run()
    {
        try {
            $controller = $this->router->dispatch();
            if ($controller instanceof Renderable) {
                $controller->render();
            } else {
                return $controller;
            }
        } catch (\Exception $exception) {
            $this->renderException($exception);
        }
    }

    /**
     * Метод обработки и отображения исключения
     * @param \Exception $exception - объект исключения
     */
    public function renderException(\Exception $exception)
    {
        if ($exception instanceof Renderable) {
            $exception->render();
        } else {
            $exception->getCode() !== 0 ? $exceptionCode = $exception->getCode() : $exceptionCode = 500;
            $exceptionMsg = $exception->getMessage();
            echo $exceptionMsg;
        }
    }

    public function initialize()
    {
        // Подключаем Capsula менеджер

        $capsule = new Capsule;

        Config::getInstance()->setConfig('db.php');
        Config::getInstance()->setConfig('menu.php');
        Config::getInstance()->setConfig('image.php');
        Config::getInstance()->setConfig('pagination.php');

        $capsule->addConnection([
            'driver'    => Config::getInstance()->get('db.driver'),
            'host'      => Config::getInstance()->get('db.host'),
            'database'  => Config::getInstance()->get('db.database'),
            'username'  => Config::getInstance()->get('db.username'),
            'password'  => Config::getInstance()->get('db.password'),
            'charset'   => Config::getInstance()->get('db.charset'),
            'collation' => Config::getInstance()->get('db.collation'),
            'prefix'    => Config::getInstance()->get('db.prefix'),
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}
