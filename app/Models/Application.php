<?php
// FILE: app/Models/Application.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_id',
        'user_id',
        'cover_letter',
        'resume_path',
        'status',
        'applied_at',
    ];

    protected $casts = [
        'applied_at' => 'datetime',
    ];

    // Relationships
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeShortlisted($query)
    {
        return $query->where('status', 'shortlisted');
    }

    // Helper methods
    public function getStatusBadgeClass()
    {
        return match($this->status) {
            'pending' => 'bg-warning',
            'reviewing' => 'bg-info',
            'shortlisted' => 'bg-success',
            'accepted' => 'bg-primary',
            'rejected' => 'bg-danger',
            default => 'bg-secondary'
        };
    }

    public function getStatusLabel()
    {
        return ucfirst($this->status);
    }
}
