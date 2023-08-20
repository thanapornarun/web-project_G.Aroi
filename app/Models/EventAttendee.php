<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EventAttendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'event_role_id',
        'status',        
    ];

    protected  $table = 'event_attendees';

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function eventRole(): BelongsToMany
    {
        return $this->belongsToMany(EventRole::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(EventRole::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($eventAttendee) {
            $eventAttendee->status = 'not pass';
        });
    }
}
