<?php
// FILE: app/Models/Profile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'bio',
        'profile_picture',
        'resume',
        'skills',
        'experience',
        'education',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
