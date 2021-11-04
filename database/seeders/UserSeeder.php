<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usersJSON = Storage::disk('public')->get("users.json");
        $users = json_decode($usersJSON);

        foreach ($users as $key => $value) {
            User::create([
                'name' => $value->name,
                'email' => $value->email,
                'password' => Hash::make($value->password),
            ]);
        }
    }
}
