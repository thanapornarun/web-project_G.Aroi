<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    public function attendees(): HasMany
    {
        return $this->hasMany(User::class, 'event_attendees');
    }

    public function Expense(): HasMany
    {
        return $this->HasMany(Expense::class);
    }    
}
