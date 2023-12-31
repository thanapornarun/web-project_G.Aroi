<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public function EventAttendee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $enum = [
        'status' => ['to do', 'in progress', 'done'],
    ];
}
