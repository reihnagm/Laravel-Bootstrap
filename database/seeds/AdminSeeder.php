<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
      \App\Models\User::create([
        "name" => "admin",
        "email" => "admin@gmail.com",
        "email_verified_at" => \Carbon\Carbon::now(),
        "role" => 2,
        "password" => Hash::make("password"),
      ]);
    }

}
