<?php

namespace App\Jobs;

use App\Models\Advertisement;
use App\Models\User;
use App\Notifications\AdvertisementCreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Advertisement $advertisement)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $advertisement = $this->advertisement;
        User::chunkById(100, function (Collection $users) use ($advertisement) {
            foreach ($users as $user){
                $user->notify(new AdvertisementCreatedNotification($advertisement));
            }
        });
    }
}
