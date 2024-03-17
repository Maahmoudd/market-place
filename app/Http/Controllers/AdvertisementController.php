<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAdvertisementRequest;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Interfaces\AdvertisementInterface;
use App\Services\AdvertisementService;

class AdvertisementController extends Controller implements AdvertisementInterface
{
    public function __construct(public AdvertisementService $advertisementService){}

    public function index()
    {
        return $this->advertisementService->index();
    }

    public function store(StoreAdvertisementRequest $request)
    {
        return $this->advertisementService->store($request);
    }

    public function show($id)
    {
        return $this->advertisementService->show($id);
    }

    public function edit($id, EditAdvertisementRequest $request)
    {
        return $this->advertisementService->edit($id, $request);
    }

    public function destroy($id)
    {
        return $this->advertisementService->destroy($id);
    }
}
