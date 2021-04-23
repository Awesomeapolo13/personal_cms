<?php


namespace App;


class Templater
{
    public function section($nick)
    {

    }

    public function yield($nick)
    {

    }

    public function extends($componentPath)
    {
        $path = implode(explode($componentPath, '.'), DIRECTORY_SEPARATOR);
        require $_SERVER['DOCUMENT_ROOT'] . $path . '.php';
    }
}