<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Observers\AdvertisementObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([AdvertisementObserver::class])]
class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'title',
      'description',
      'category',
      'price',
      'location',
      'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
