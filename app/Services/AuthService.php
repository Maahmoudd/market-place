<?php

namespace App\Services;

use App\Exceptions\FailedLogin;
use App\Http\Resources\UserResource;
use App\Interfaces\AuthInterface;
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
        $user = User::where('email', $request->email)->first();
        return ['user' => UserResource::make($user), 'token' => $token->plainTextToken];
    }


    public function logout($request)
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return ['status' => 'success'];
    }
}
