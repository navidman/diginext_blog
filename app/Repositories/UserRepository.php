<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function save($data)
    {
        $user = new User($data);
        $user->save();
        return $user;
    }

    public function getById($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

}
