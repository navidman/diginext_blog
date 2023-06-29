<?php

namespace App\Services;

use App\Repositories\Interfaces\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost($data)
    {
        return $this->postRepository->save([
            'title' => $data->title,
            'content' => $data->content
        ]);
    }

    public function getPost($id)
    {
        $post = $this->postRepository->getById($id);
        if($post) {
           $post = ['title' => $post->title, 'content' => $post->content];
        }
        return $post;
    }
}
