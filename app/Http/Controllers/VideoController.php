<?php

namespace App\Http\Controllers;

use App\Facades\VideoFacade;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VideoController extends Controller
{
    public function store(VideoRequest $request)
    {
        if (!$request->hasHeader('User-ID')) {
            return response('The User-ID header is required.', Response::HTTP_BAD_REQUEST);
        }
        try {
            $post = VideoFacade::createVideo($request);
            return response($post->id, Response::HTTP_CREATED);
        } catch (\Throwable $throwable) {
            report($throwable);
            return response('Internal server error!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        $post = VideoFacade::getVideo($id);
        return response($post, Response::HTTP_CREATED);

    }

    public function comment(Request $request)
    {
        dd(1);
    }
}
