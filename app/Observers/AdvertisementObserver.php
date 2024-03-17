<?php

namespace App\Observers;

use App\Jobs\ChargeUser;
use App\Jobs\SendToUsers;
use App\Models\Advertisement;
use App\Models\User;

class AdvertisementObserver
{

    public function created(Advertisement $advertisement): void
    {
        $user = User::findOrFail($advertisement->user_id);
        ChargeUser::dispatch($user);
//        SendToUsers::dispatch($advertisement);
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
