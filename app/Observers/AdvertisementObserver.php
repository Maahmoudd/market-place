<?php

namespace App\Observers;

use App\Models\Advertisement;
use App\Models\User;
use App\Notifications\AdvertisementCreatedNotification;
use Illuminate\Database\Eloquent\Collection;

class AdvertisementObserver
{

    public function created(Advertisement $advertisement): void
    {
        User::chunk(100, function (Collection $users) use ($advertisement) {
           foreach ($users as $user){
               $user->notify(new AdvertisementCreatedNotification($advertisement));
           }
        });
    }

    public function updated(Advertisement $advertisement): void
    {
        //
    }

    public function deleted(Advertisement $advertisement): void
    {
        //
    }

    public function restored(Advertisement $advertisement): void
    {
        //
    }

    public function forceDeleted(Advertisement $advertisement): void
    {
        //
    }
}
