<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'coverletter',
        'last_experience_job_title',
        'last_experience_job_company',
        'last_experience_job_summary',
        'resume',
        'job_id',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
