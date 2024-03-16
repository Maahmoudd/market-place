<?php

namespace App\Http\Services;

use App\Http\Interfaces\UserInterface;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserService implements UserInterface
{
    public function show($id)
    {

        $user = User::findOrFail($id);
        return UserResource::make($user);
    }

    public function edit($id, $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        return UserResource::make($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ['status' => 'deleted'];
    }

}
