<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс пагинации
 */
class Pagination implements PaginationInterface
{
    //ToDo нужно передать в класс модель для которой будет происходить пагинация

    //ToDo из модели получить необходимое количество записей (создать запрос в БД), отобразить их на странице
    /**
     * @var Model[] - коллекция моделей по отношению к которым необходима пагинация
     */
    private array $models;

    /**
     * @var int - страница, которую необходимо отражать
     */
    private int $pageNumber;

    /**
     * @var int|null - количество записей, которое нужно выбрать
     */
    private ?int $count;

    /**
     * @param array $models
     * @param int|null $pageNumber
     * @param int|null $count
     */
    public function __construct(array $models, ?int $pageNumber = null, ?int $count = null)
    {
        $this->validatePageNumber($pageNumber);
        if (empty($models)) {
            throw new \InvalidArgumentException('Передана пустая коллекция $models');
        }

        $this->models = $models;
        $this->pageNumber = $pageNumber ?? 1;
        $this->count = $count ?? Config::getInstance()->get('pagination.limit');
    }

    /**
     * Фильтрует и выбирает необходимые модели из коллекции для отображения на странице
     *
     * @return Model[] - отфильтрованная колекция моделей
     */
    public function paginate(): array
    {
        $result = [];
        $startPos = $this->pageNumber === 1 ? 0 : $this->count * --$this->pageNumber;
        $endPos = $startPos + $this->count - 1;
        foreach ($this->models as $key => $model) {
            if ($key >= $startPos && $key <= $endPos) {
                $result[] = $model;
            }
        }

        return $result;
    }

    /**
     * Валидирует переданный номер страницы
     *
     * @param int|null $pageNumber - номер страницы
     * @return void
     */
    private function validatePageNumber(?int $pageNumber): void
    {
        if (!isset($pageNumber)) {
            return;
        }

        if ($pageNumber <= 0) {
            throw new \InvalidArgumentException('Параметр $pageNumber должен быть больше 0. Передан ' . $pageNumber);
        }

        if ($this->pageNumber > ceil(count($this->models) / $this->count)) {
            throw new \InvalidArgumentException('Параметр $pageNumber = ' . $pageNumber . ' больше чем общее количество страниц');
        }
    }
}
