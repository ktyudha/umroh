<?php

namespace Database\Seeders;

use App\Models\Hotel\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Madinah Mekkah',
            'slug' => Str::slug('Hotel Madinah Mekkah'),
            'description' => 'Hotel bintang 5 dekat Masjid Nabawi',
            'address' => 'Jalan Madinah No. 1',
            'rating' => 5,
            'gmap' => 'https://maps.google.com/?q=hotel+madinah',
            'facility' => 'AC, Wi-Fi, Sarapan, Layanan 24 jam',
        ]);
    }
}
