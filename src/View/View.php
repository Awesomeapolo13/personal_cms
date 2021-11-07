<?php

namespace App\View;

use App\RenderInterface;

/**
 * Класс отображения страницы
 */
class View implements RenderInterface
{
    /**
     * @var string - путь до отображаемой страницы, переданный через .
     */
    public string $page;

    /**
     * @var array - именованный массив с данными для отображения на странице
     */
    public array $data;

    public function __construct($page, $data)
    {
        $this->page = $page;
        $this->data = $data;
    }

    public function render(): void
    {
        $filePath = str_replace('.', '/', $this->page);
        require $_SERVER['DOCUMENT_ROOT'] . '/' . $filePath . '.php';
    }
}
