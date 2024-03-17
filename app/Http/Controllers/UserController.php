<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Interfaces\UserInterface;
use App\Services\UserService;

class UserController extends Controller implements UserInterface
{
    public function __construct(public UserService $userService){}

    public function show($id)
    {
        return $this->userService->show($id);
    }

    public function edit($id, EditProfileRequest $request)
    {
        return $this->userService->edit($id, $request);
    }


    public function destroy($id)
    {
        return $this->userService->destroy($id);
    }
}
