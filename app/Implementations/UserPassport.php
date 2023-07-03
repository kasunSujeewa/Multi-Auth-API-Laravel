<?php

namespace App\Implementations;

use App\Contracts\PassportOperations;
use App\Service\UserPassportService;

class UserPassport implements PassportOperations
{

    private $user;
    public function __construct(UserPassportService $user) 
    {
        $this->user = $user;
    }

    public function register($request)
    {
        return $this->user->register($request);
    }

    public function login($request)
    {
        return $this->user->login($request);
    }

    public function logout($request)
    {
        return $this->user->logout($request);
    }

}