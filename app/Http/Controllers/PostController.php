<?php

namespace App\Http\Controllers;

use App\Facades\PostFacade;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        if (!$request->hasHeader('User-ID')) {
            return response('The User-ID header is required.', Response::HTTP_BAD_REQUEST);
        }
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
        return response($post, Response::HTTP_OK);

    }

    public function comment($id, CommentRequest $request)
    {
        if (!$request->hasHeader('User-ID')) {
            return response('The User-ID header is required.', Response::HTTP_BAD_REQUEST);
        }
        try {
            PostFacade::createComment($id, $request);
            return response('created', Response::HTTP_CREATED);
        } catch (\Throwable $throwable) {
            report($throwable);
            return response('Internal server error!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
