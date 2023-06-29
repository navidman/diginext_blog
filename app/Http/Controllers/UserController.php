<?php

namespace App\Http\Controllers;

use App\Facades\UserFacade;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        try {
            $user = UserFacade::registerUser($request);
            return response($user->id, Response::HTTP_CREATED);
        } catch (\Throwable $throwable) {
            report($throwable);
            return response('Internal server error!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        try {
            $user = UserFacade::getUser($id);
            return response($user, Response::HTTP_OK);
        } catch (\Throwable $throwable) {
            report($throwable);
            return response('Internal server error!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
