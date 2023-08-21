<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class EventRole extends Model
{
    use HasFactory;

    protected $table = 'eventRoles';

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
