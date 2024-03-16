<?php

namespace App\Http\Services;

use App\Exceptions\FailedLogin;
use App\Http\Interfaces\AuthInterface;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthInterface
{
    public function register($request)
    {
        $user = User::create($request->validated());
        return UserResource::make($user);
    }

    public function login($request)
    {
        if (!Auth::attempt($request->validated())) {
            throw new FailedLogin();
        }
        $token = $request->user()->createToken('remember_token');

        return ['token' => $token->plainTextToken];
    }


    public function logout($request)
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return ['status' => 'success'];
    }
}
