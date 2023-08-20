<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    public function User(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected $enum = [
        'gender' => ['female', 'male', 'not specified'],
    ];
    
    protected    $fillable = ['user_id','full_name','gender','address','phone_number','profile_picture','date_of_birth',]; 
}
