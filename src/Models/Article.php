<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *  Класс модели статьи
 */
class Article extends BaseModel
{
    /**
     * @var string - имя таблицы, к которой относится эта модель
     */
    protected $table = 'articles';

    /**
     * @var string[] - масиив изменяемых столбцов
     */
    protected $fillable = [
        'title',
        'body',
        'description',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
}