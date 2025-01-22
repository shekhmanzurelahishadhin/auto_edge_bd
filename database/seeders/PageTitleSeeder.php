<?php

namespace Database\Seeders;

use App\Models\PageTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PageTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PageTitle::updateOrCreate([
            'page_name' => 'about_us' // Matching condition
        ],[
            'page_name' => 'about_us',
            'page_title' => 'About MotorLand',
            'page_sub_title' => 'Tempor incididunt duis labore dolore magna aliqua sed ipsum',
        ]);
    }
}
