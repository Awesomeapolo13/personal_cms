<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Support\Collection;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'online',
        'created_at',
        'updated_at'
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_user', 'user_id', 'group_id');
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'user_id', 'id');
    }

    public function staticPages(): HasMany
    {
        return $this->hasMany(StaticPage::class, 'user_id', 'id');
    }

    /**
     * Получает список групп авторизации, к которым относится пользователь
     *
     * @param int $id - идентификатор пользователя
     * @return Collection
     */
    public function getGroupNames(int $id): Collection
    {
        return DB::table($this->table)
            ->select('groups.name')
            ->leftJoin('group_user', 'users.id', '=', 'group_user.user_id')
            ->leftJoin('groups', 'groups.id', '=', 'group_user.group_id')
            ->where('users.id', '=', $id)
            ->groupBy('user.id', 'groups.name')
            ->get();
    }
}
