<?php

namespace App\Http\Controllers;

use App\Contracts\PassportOperations;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PassportController extends Controller
{
    public $passport;

    public function __construct(PassportOperations $passport) {
       $this->passport = $passport; 
    }
    
    public function Register(RegisterRequest $request) : JsonResponse {
        return $this->passport->register($request->validated());
    }

    public function Login(LoginRequest $request) : JsonResponse {
        return $this->passport->login($request->validated());
    }

    public function Logout(Request $request) : JsonResponse {
        return $this->passport->logout($request);
    }
}
