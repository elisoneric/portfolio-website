<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/AdminUserSeeder.php

    // database/seeders/AdminUserSeeder.php
public function run()
{
    \App\Models\User::create([
        'name' => 'Admin',
        'email' => '3li.boz@gmail.com',
        'password' => bcrypt('Rhs//0300'), // Change this
        'email_verified_at' => now(),
        'is_admin' => true // If you have this column
    ]);
}
}
