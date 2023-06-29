<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser($data)
    {
        return $this->userRepository->save([
            'username' => $data->username
        ]);
    }

    public function getUser($id)
    {
        $user = $this->userRepository->getById($id);
        if($user) {
            $user = ['username' => $user->username];
        }
        return $user;
    }
}
