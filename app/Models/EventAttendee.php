<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EventAttendee extends Model
{
    use HasFactory;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): belongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function eventRole(): belongsTo
    {
        return $this->belongsTo(EventRole::class);
    }
}
