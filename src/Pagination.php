<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Класс пагинации
 */
class Pagination implements PaginationInterface
{
    //ToDo возможно стоит передать в класс модель для которой будет происходить пагинация, внутри модели сделать запрос записей в соотсветствии с номером страницы
    //ToDO подумать по поводу паттерна мост для отображения пагинации

    /**
     * @var Model[] - коллекция моделей по отношению к которым необходима пагинация
     */
    private iterable $models;

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
    public function __construct(iterable $models, int $pageNumber = 1, ?int $count = null)
    {
        $count = $count ?? Config::getInstance()->get('pagination.limit');

        $this->validateInputData($pageNumber, $models, $count);

        $this->models = $models;
        $this->pageNumber = $pageNumber ?? 1;
        $this->count = $count;
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
     * @param iterable $models - коллекция моделей
     * @param int|null $count - число записей, выводимое на
     * @return void
     */
    private function validateInputData(int $pageNumber, iterable $models, ?int $count = null): void
    {
        if (empty($models)) {
            throw new \InvalidArgumentException('Передана пустая коллекция $models');
        }

        if ($pageNumber <= 0) {
            throw new \InvalidArgumentException('Параметр $pageNumber должен быть больше 0. Передан ' . $pageNumber);
        }

        if ($pageNumber > ceil($models->count() / $count ?? Config::getInstance()->get('pagination.limit'))) {
            throw new \InvalidArgumentException('Параметр $pageNumber = ' . $pageNumber . ' больше чем общее количество страниц');
        }
    }
}
