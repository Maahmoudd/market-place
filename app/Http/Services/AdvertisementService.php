<?php

namespace App\Http\Services;

use App\Exceptions\NotAuthorizedException;
use App\Http\Enums\AdvertisementEnum;
use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Collection;

class AdvertisementService
{
    public function index()
    {
        $advertisements = Advertisement::paginate(10);

        return AdvertisementResource::collection($advertisements);
    }

    public function store($request)
    {
        $advertisement = Advertisement::create(
            array_merge(
                $request->validated(),
                ['user_id' => auth()->id(), 'status' => AdvertisementEnum::Active]
            ));
        return AdvertisementResource::make($advertisement);
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return AdvertisementResource::make($advertisement);
    }

    public function edit($id, $request)
    {
        $advertisement = Advertisement::findOrFail($id);
        if ($advertisement->user_id != auth()->id()){
            throw new NotAuthorizedException();
        }
        $advertisement->update($request->validated());
        return AdvertisementResource::make($advertisement);
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        if ($advertisement->user_id != auth()->id()){
            throw new NotAuthorizedException();
        }
        return $advertisement->delete();
    }
}
