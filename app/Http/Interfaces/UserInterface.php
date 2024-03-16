<?php

namespace App\Http\Interfaces;

use App\Http\Requests\EditProfileRequest;

interface UserInterface
{
    public function show($id);

    public function edit($id, EditProfileRequest $request);

    public function destroy($id);
}
