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

    // public function EventRoles(): HasMany
    // {
    //     return $this->hasMany(EventRole::class);
    // }

    public function eventAttendees(): HasMany
    {
        return $this->hasMany(EventAttendee::class);
    }

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class);
    }    
    
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function certificate():BelongsTo{
        return $this->belongsTo(Cretificate::class);
    }

    public function kanban():HasMany{
        return $this->hasMany(KanbanBoard::class);
    }

    protected $enum = [
        'category' => ['Education', 'Music and Festival'],
    ];
}
