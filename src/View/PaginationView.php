<?php

namespace App\View;

use App\PaginationImplementationInterface;

/**
 * Класс отображения пагинатора
 */
class PaginationView implements PaginationImplementationInterface
{
    /**
     * Метод отображения пагинатора
     */
    public function render($templateName, $fullCount, $limit, $data = null): void
    {
        if ($fullCount > $limit) {
            require $_SERVER['DOCUMENT_ROOT'] . '/view/layout/' .$templateName. '.php';
        }
    }
}
