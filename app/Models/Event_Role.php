<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Event_Role extends Model
{
    use HasFactory;

    protected $table = 'event_roles';

    protected $fillable = ['roles'];

    public function eventAttendees(): BelongsToMany
    {
        return $this->belongsToMany(EventAttendee::class);
    }

    protected $enum = [
        'category' => ['Education', 'Music and Festival'],
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($eventRole) {
    //         $eventRole->roles = 'guest';
    //     });
    // }
}
