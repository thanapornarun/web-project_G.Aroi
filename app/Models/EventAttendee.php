<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EventAttendee extends Model
{
    use HasFactory;

    public function event(): belongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function eventRole(): HasOne
    {
        return $this->hasOne(EventRole::class);
    }
}
