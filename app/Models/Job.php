<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'job_description',
        'company_name',
        'company_location',
        'job_requirements',
        'job_types',
        'work_conditions',
        'job_categories',
        'job_salary',
        'business_id'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'business_id');
    }
}
