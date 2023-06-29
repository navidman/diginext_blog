<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    public function save($data);
    public function getById($id);
}
