<?php

namespace App\Service;

use App\Models\BaseModel;
use App\PaginationImplementationInterface;
use App\PaginationInterface;

/**
 * Класс пагинации
 *
 * Основываясь на переданных модели, количества записей для отображения на странице и номера страницы
 * достает, посредством методов модели, необходимые для отображения на этой странице данные.
 * Способен отобразить конкретный шаблон пагинатора. Отображение реализовано на основании паттерна мост - отображение
 * вынесено в отдельный класс реализации, реализующий интерфейс App\PaginationImplementationInterface
 */
class Pagination implements PaginationInterface
{
    //ToDO подумать по поводу паттерна мост для отображения пагинации (класс Pagination сделать как абстракцию, сделать класс отвечающий за отображение самого пагинатора от него наследовать конкретные пагинаторы)

    /**
     * @var BaseModel - модель по отношению к которой производим пагинацию
     */
    private BaseModel $model;

    /**
     * @var int - страница, которую необходимо отражать
     */
    private int $pageNumber;

    /**
     * @var int - количество записей, которое нужно выбрать
     */
    private int $count;

    /**
     * @var int - полное количество записей
     */
    private int $fullCountRecords;

    /**
     * @var PaginationImplementationInterface
     */
    protected PaginationImplementationInterface $paginatorView;

    /**
     * @param BaseModel $model
     * @param int|null $count
     * @param PaginationImplementationInterface $paginatorView
     * @param int|null $pageNumber
     */
    public function __construct(BaseModel $model, int $count, PaginationImplementationInterface $paginatorView, ?int $pageNumber = 1)
    {
        $fullCountRecords = $model->getFullCount();
        $validPageNumber = $this->validateAndPrepareInputData($pageNumber, $fullCountRecords, $count);

        $this->model = $model;
        $this->pageNumber = $validPageNumber;
        $this->count =$count;
        $this->fullCountRecords = $fullCountRecords;
        $this->paginatorView = $paginatorView;
    }

    /**
     * Вычисляет и возвращает количество страниц
     *
     * @return float
     */
    public function calculatePagesCount(): float
    {
        return ceil($this->model->getFullCount() / $this->count);
    }

    /**
     * Вычисляет следующую страницу пагинатора
     *
     * @return float|int
     */
    public function calculateNextPage()
    {
        return $this->pageNumber >= $this->calculatePagesCount() ? $this->calculatePagesCount() : $this->pageNumber + 1;
    }

    /**
     * Вычисляет предыдущую страницу пагинатора
     *
     * @return int
     */
    public function calculatePreviousPage(): int
    {
        // Пришлось заменить инкременты и декременты у $this->pageNumber? т.к. это сбивает метод paginate при повторном применении
        return $this->pageNumber <= 0 ? 1 : $this->pageNumber - 1;
    }

    /**
     * Возвращает коллекцию из определенного количества моделей, начиная с рассчитанной из свойств класса позиции
     *
     * @return BaseModel[] - коллекция моделей
     */
    public function paginate(): iterable
    {
        $startPos = $this->pageNumber === 1 ? 0 : $this->count * ($this->pageNumber - 1);

        return $this->model->getLimitRecordsFromPosition($startPos, $this->count);
    }

    /**
     * Отображает шаблон пагинации
     */
    public function renderPaginator()
    {
        $this->paginatorView->render('paginator', $this->fullCountRecords, $this->count, $this);
    }

    /**
     * Валидирует и подготавливает входные данные
     *
     * @param int|null $pageNumber - номер страницы
     * @param int $fullModelsCount - общее количество моделей в коллекции
     * @param int|null $count - число записей, выводимое на странице
     * @return int - содержит валидный номер текущей страницы
     */
    private function validateAndPrepareInputData(int $pageNumber, int $fullModelsCount, int $count): int
    {
        // число выводимых записей не может быть меньше или равно 0
        if ($count <= 0) {
           throw new \InvalidArgumentException('Количество выводимых на странице записей должно быть больше 0. Передано $count = ' . $count);
        }
        // номер страницы не может быть меньше или равно 0
        if ($pageNumber <= 0) {
            $pageNumber = 1;
        }
        // номер текущей страницы не может быть больше максимального количества страниц
        if ($pageNumber > ceil($fullModelsCount / $count)) {
            $pageNumber = ceil($fullModelsCount / $count);
        }

        return $pageNumber;
    }
}
