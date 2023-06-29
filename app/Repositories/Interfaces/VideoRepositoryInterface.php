<?php

namespace App\Repositories\Interfaces;

interface VideoRepositoryInterface
{
    public function save($data);
    public function getById($id);
}
