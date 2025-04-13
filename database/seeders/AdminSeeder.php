<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'), // Gunakan bcrypt
        ]);
    }
}


