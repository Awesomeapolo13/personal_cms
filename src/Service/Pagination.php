<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use App\PaginationInterface;
use App\Config;

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
        // определяем count (что делать если в конфиге не будет нужного параметра?)
        $count = $count ?? Config::getInstance()->get('pagination.limit');

        $validInputData = $this->validateAndPrepareInputData($pageNumber, $models, $count);

        $this->models = $models;
        $this->pageNumber = $validInputData[0];
        $this->count = $validInputData[1];
    }

    /**
     * Вычисляет и возвращает количество страниц
     *
     * @return float
     */
    public function calculatePagesCount(): float
    {
        return ceil($this->models->count() / $this->count);
    }

    /**
     * Вычисляет следующую страницу пагинатора
     *
     * @return float|int|mixed
     */
    public function calculateNextPage()
    {
        return $this->pageNumber >= $this->calculatePagesCount() ? $this->calculatePagesCount() : ++$this->pageNumber;
    }

    /**
     * Вычисляет предыдущую страницу пагинатора
     *
     * @return int|mixed
     */
    public function calculatePreviousPage()
    {
        return $this->pageNumber <= 0 ? 1 : --$this->pageNumber;
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
     * Валидирует и подготавливает входные данные
     *
     * @param int|null $pageNumber - номер страницы
     * @param iterable $models - коллекция моделей
     * @param int|null $count - число записей, выводимое на странице
     * @return array - содержит валидные номер текущей страницы и количество записей на странице
     */
    private function validateAndPrepareInputData(int $pageNumber, iterable $models, ?int $count = null): array
    {
        // нельзя передавать пустую коллекцию моделей
        if (empty($models)) {
            throw new \InvalidArgumentException('Передана пустая коллекция $models');
        }
        // если количество выводимых записей на странице не определено, то берем из конфигурации
        if ($count === null) {
            $count = Config::getInstance()->get('pagination.limit');
        }
        // число выводимых записей не может быть меньше или равно 0
        if ($count <= 0) {
           throw new \InvalidArgumentException('Количество выводимых на странице записей должно быть больше 0. Передано $count = ' . $count);
        }
        // номер страницы не может быть меньше или равно 0
        if ($pageNumber <= 0) {
            $pageNumber = 1;
        }
        // номер текущей страницы не может быть больше максимального количества страниц
        if ($pageNumber > ceil($models->count() / $count)) {
            $pageNumber = ceil($models->count() / $count);
        }

        return [$pageNumber, $count];
    }
}
