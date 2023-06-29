<?php

namespace App\Repositories;


use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function save($data)
    {
        $post = new Post($data);
        $post->save();
        return $post;
    }

    public function getById($id)
    {
        $post = Post::findOrFail($id);
        return $post;
    }

}
