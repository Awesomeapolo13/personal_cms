<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

interface PaginationInterface
{
    /**
     * Возвращает коллекцию моделей, необходимых из для отображения на странице
     *
     * @return Model[]
     */
    public function paginate(): iterable;
}
