<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPersmissions = Permission::all();
        Role::updateOrCreate([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'deletable' => false,
        ])->permissions()->sync($adminPersmissions->pluck('id'));
    }
}
