<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate([
            'name' => 'Mr. Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'type' => 'super_admin',
            'status' => true,
            'deletable' => false,
        ]);
    }
}
