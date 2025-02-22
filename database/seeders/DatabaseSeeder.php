<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionSeeder::class);
        $this->call(LookupSeeder::class);
//        $this->call(PageTitleSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(AdminRoleSeeder::class);
    }
//    public function run()
//    {
//        $brands = [2, 3, 4, 5, 6, 7]; // Example brand IDs
//        $models = [1, 3, 4, 5, 6, 7]; // Example model IDs
//        $years = [2, 3, 4, 5, 6, 7]; // Example years
//        $fuel_types = [ 2, 3, 4, 5, 6 , 7]; // Example fuel type IDs
//
//        for ($i = 1; $i <= 50; $i++) {
//            $title = 'Vehicle ' . $i;
//            $slug = Str::slug($title);
//
//            DB::table('vehicles')->insert([
//                'brand_id'          => $brands[array_rand($brands)],
//                'model_id'          => $models[array_rand($models)],
//                'year_id'           => $years[array_rand($years)],
//                'fuel_type_id'      => $fuel_types[array_rand($fuel_types)],
//                'title'             => $title,
//                'slug'              => $slug,
//                'short_description' => 'Short description for ' . $title,
//                'description'       => '<p>This is a sample description for ' . $title . '.</p>',
//                'main_image'        => 'uploads/vehicle/2025-01-31-483a75_263x210_1.jpg',
//                'price'             => rand(20000, 100000), // Random price between 20k - 100k
//                'status'            => 1,
//                'created_by'        => 1,
//                'updated_by'        => 1,
//                'deleted_at'        => null,
//                'created_at'        => now(),
//                'updated_at'        => now(),
//            ]);
//        }
//    }
}
