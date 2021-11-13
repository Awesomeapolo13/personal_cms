<?php

namespace App;

interface ValidationInterface
{
    /**
     * Метод валидации данных
     *
     * @return mixed
     */
    public function validate();
}