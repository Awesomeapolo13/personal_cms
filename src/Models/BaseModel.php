<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Класс, расширяющий класс модели Illuminate\Database\Eloquent\Model
 *
 * Здесь описаны базовые методы, присущие всем моделям
 */
abstract class BaseModel extends Model
{
    /**
     * Возвращает коллекцию из заданного количества моделей начиная с определенной позиции,
     * отсортированную по дате создания по убыванию
     *
     * @param int $from - позиция с которой начинаем выбирать модели
     * @param int $limit - предельное количество моделей для выборки
     * @return Collection
     */
    public function getLimitRecordsFromPosition(int $from, int $limit): Collection
    {
        return DB::table($this->table)
            ->limit($limit)
            ->offset($from)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Получает общее количество записей в таблице
     *
     * @return int - количество запискей в таблице
     */
    public function getFullCount(): int
    {
        return DB::table($this->table)
            ->count();
    }
}