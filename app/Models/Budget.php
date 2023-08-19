<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Budget extends Model
{
    use HasFactory;

    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);

    }
}
