<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $jobJson = Storage::disk('public')->get("jobs.json");
        $jobs = json_decode($jobJson);

        foreach ($jobs as $key => $value) {
            Job::create([
                'job_title' => $value->job_title,
                'job_description' => $value->job_description,
                'company_name' => $value->company_name,
                'company_location' => $value->company_location,
                'job_requirements' => $value->job_requirements,
                'job_types' => $value->job_types,
                'work_conditions' => $value->work_conditions,
                'job_categories' => $value->job_categories,
                'job_salary' => $value->job_salary,
                'business_id' => $value->business_id,
            ]);
        }
    }
}
