<?php

namespace App\View;

class View implements Renderable
{
    public string $page;

    public array $data;

    public function __construct($page, $data)
    {
        $this->page = $page;
        $this->data = $data;
    }

    public function render()
    {
        $filePath = str_replace('.', '/', $this->page);
        require $_SERVER['DOCUMENT_ROOT'] . '/' . $filePath . '.php';
    }
}
