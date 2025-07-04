<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelImage;

class HotelImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotel = Hotel::first(); // ambil hotel pertama

        if ($hotel) {
            HotelImage::create([
                'hotel_id' => $hotel->id,
                'image' => 'https://example.com/images/hotel.jpg'
            ]);
        }
    }
}
