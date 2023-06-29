<?php

namespace App\Services;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class PostService
{
    protected $postRepository;
    protected $userRepository;

    public function __construct(PostRepositoryInterface $postRepository, UserRepositoryInterface $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    public function createPost($data)
    {
        return $this->postRepository->save([
            'title' => $data->title,
            'content' => $data->content,
            'user_username' => $this->getUsernameFromUserId($data->header('User-ID'))
        ]);
    }

    public function getPost($id)
    {
        $post = $this->postRepository->getById($id);
        return $post->load('comments');
    }

    private function getUsernameFromUserId($userId)
    {
        $user = $this->userRepository->getById($userId);
        return $user->username;
    }
}
