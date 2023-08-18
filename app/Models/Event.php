<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    public function event_roles(): HasMany
    {
        return $this->hasMany(Event_Role::class);
    }

    public function eventAttendees(): HasMany
    {
        return $this->hasMany(eventAttendee::class);
    }

    public function expenses(): HasMany
    {
        return $this->HasMany(Expense::class);
    }    
    
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
