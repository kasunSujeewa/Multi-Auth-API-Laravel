<?php

namespace App\Service;

use App\Models\User;

class AdminPassportService
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($request)
    {
        $user = $this->user->adminRegister($request);

        return successResponse('Register successfully done', $user, 201); 
    }

    public function login($request)
    {
        if (auth()->attempt($request)) 
        {
            $auth_user = $this->user->auth_user();

            $auth_user['token'] = $auth_user->createToken('crick-sc',['admin-task'])->accessToken;

            return successResponse('login successfully done', $auth_user, 200);

        }
        else
        {
            return errorResponse('check your credentials', [], 401);
        }
    }

    public function logout($request)
    {
        $request->user()->tokens()->delete();

        return successResponse('logout successfully done', [], 204);
    }
}