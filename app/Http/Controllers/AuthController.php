<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthInterface;
use App\Services\AuthService;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller implements AuthInterface
{
    public function __construct(public AuthService $authService){}

    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request);
    }


    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }
}
