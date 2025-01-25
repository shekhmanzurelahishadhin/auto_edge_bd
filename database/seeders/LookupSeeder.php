<?php

namespace Database\Seeders;

use App\Models\Lookup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LookupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lookup::updateOrCreate([
            'name' => 'About Us',
        ],[
            'type' => 'title_page',
            'name' => 'About Us',
            'code' => 'about_us',
        ]);
        Lookup::updateOrCreate([
            'name' => 'Photo Gallery',
        ],[
            'type' => 'title_page',
            'name' => 'Photo Gallery',
            'code' => 'photo_gallery',
        ]);
        Lookup::updateOrCreate([
            'name' => 'Latest News',
        ],[
            'type' => 'title_page',
            'name' => 'Latest News',
            'code' => 'latest_news',
        ]);

        Lookup::updateOrCreate([
            'name' => 'Contact Us',
        ],[
            'type' => 'title_page',
            'name' => 'Contact Us',
            'code' => 'contact_us',
        ]);
        Lookup::updateOrCreate([
            'name' => 'Featured Vehicles',
        ],[
            'type' => 'title_page',
            'name' => 'Featured Vehicles',
            'code' => 'featured_vehicles',
        ]);
        Lookup::updateOrCreate([
            'name' => 'Subscribe',
        ],[
            'type' => 'title_page',
            'name' => 'Subscribe',
            'code' => 'subscribe',
        ]);
        Lookup::updateOrCreate([
            'name' => 'Auction Sheet Guide',
        ],[
            'type' => 'title_page',
            'name' => 'Auction Sheet Guide',
            'code' => 'auction_sheet_guide',
        ]);
    }
}
