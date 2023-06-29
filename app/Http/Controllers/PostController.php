<?php

namespace App\Http\Controllers;

use App\Facades\PostFacade;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Response;


class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        try {
            $post = PostFacade::createPost($request);
            return response($post->id, Response::HTTP_CREATED);
        } catch (\Throwable $throwable) {
            report($throwable);
            return response('Internal server error!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        $post = PostFacade::getPost($id);
        return response($post, Response::HTTP_CREATED);

    }
}
