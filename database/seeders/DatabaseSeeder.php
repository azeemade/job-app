<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        //Job::truncate();
        //Application::truncate();
        $this->call([
            UserSeeder::class,
            JobSeeder::class,
            ApplicationSeeder::class
        ]);
    }
}
