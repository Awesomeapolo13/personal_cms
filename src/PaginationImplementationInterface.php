<?php

namespace App;

/**
 * Общий интерфейс для классов отображающий конкретные пагинаторы
 */
interface PaginationImplementationInterface
{
    /**
     * Метод отображения пагинации
     *
     * @param string $templateName - имя шаблона пагинатора
     * @param int $fullCount - общее количество записей
     * @param int $limit - предельное количество записей, отображаемое на одной странице
     * @param null $data - данные для встраивания в шаблон пагинатора
     * @return void
     */
    public function render (string $templateName, int $fullCount, int $limit, $data = null):  void;
}
