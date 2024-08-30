<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function find($id)
    {
        return User::query()->find($id);
    }

    public function create(array $data)
    {
        return User::query()->create($data);
    }
}
