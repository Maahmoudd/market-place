<?php

namespace App\Observers;

use App\Jobs\SendToUsers;
use App\Models\Advertisement;

class AdvertisementObserver
{

    public function created(Advertisement $advertisement): void
    {
        SendToUsers::dispatch($advertisement);
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
