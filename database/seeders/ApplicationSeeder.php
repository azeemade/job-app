<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::truncate();

        $applicationJson = Storage::disk('public')->get("applications.json");
        $applications = json_decode($applicationJson);

        foreach ($applications as $key => $value) {
            Application::create([
                'firstname' => $value->firstname,
                'lastname' => $value->lastname,
                'email' => $value->email,
                'phone' => $value->phone,
                'address' => $value->address,
                'coverletter' => $value->coverletter,
                'last_experience_job_title' => $value->last_experience_job_title,
                'last_experience_job_company' => $value->last_experience_job_company,
                'last_experience_job_summary' => $value->last_experience_job_summary,
                'resume' => $value->resume,
                'job_id' => $value->job_id
            ]);
        }
    }
}
