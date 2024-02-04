<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = new Admin;
        $admin->name = 'superadmin';
        $admin->email = 'superadmin@shoesmasher.com';
        $admin->password = bcrypt('123456');
        $admin->save();
    }
}
