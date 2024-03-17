<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
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
