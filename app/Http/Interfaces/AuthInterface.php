<?php

namespace App\Http\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Request;

interface AuthInterface
{
    public function register(RegisterRequest $request);

    public function login(LoginRequest $request);


    public function logout(Request $request);
}
