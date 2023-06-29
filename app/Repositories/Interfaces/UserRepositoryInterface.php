<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function save($data);
    public function getById($id);
}
