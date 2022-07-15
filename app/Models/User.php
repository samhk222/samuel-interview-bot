<?php

namespace App\Models;

use Domain\User\QueryBuilder\UserQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'user_id',
        'show_menus'
    ];

    public function newEloquentBuilder($query): UserQueryBuilder
    {
        return new UserQueryBuilder($query);
    }
}
