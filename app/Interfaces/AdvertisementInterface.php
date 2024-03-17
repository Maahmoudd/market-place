<?php

namespace App\Interfaces;

use App\Http\Requests\EditAdvertisementRequest;
use App\Http\Requests\StoreAdvertisementRequest;

interface AdvertisementInterface
{
    public function index();

    public function store(StoreAdvertisementRequest $request);

    public function show($id);

    public function edit($id, EditAdvertisementRequest $request);

    public function destroy($id);
}
