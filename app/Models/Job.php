<?php
// FILE: app/Models/Job.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'requirements',
        'responsibilities',
        'location',
        'job_type',
        'salary_min',
        'salary_max',
        'experience_level',
        'category',
        'deadline',
        'status',
        'views',
    ];

    protected $casts = [
        'deadline' => 'date',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_jobs')->withTimestamps();
    }

    // Query Scopes
    public function scopeOpen($query)
    {
        return $query->where('status', 'open')
                    ->where('deadline', '>=', now());
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc');
    }

    // Helper methods
    public function isOpen()
    {
        return $this->status === 'open' && $this->deadline >= now();
    }

    public function formattedSalary()
    {
        if ($this->salary_min && $this->salary_max) {
            return 'RM ' . number_format($this->salary_min, 2) . ' - RM ' . number_format($this->salary_max, 2);
        }
        return 'Negotiable';
    }
}
