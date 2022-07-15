<?php

namespace Domain\User\QueryBuilder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class UserQueryBuilder extends Builder
{
    public function findByTelegramId(string $user_id): Model|UserQueryBuilder|null
    {
        return $this->where('user_id', $user_id)->first();
    }
}
