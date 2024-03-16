<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UserInterface;
use App\Http\Requests\EditProfileRequest;
use App\Http\Services\UserService;

class UserController extends Controller implements UserInterface
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

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
