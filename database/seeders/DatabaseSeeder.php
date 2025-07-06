<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Hotel\HotelImageSeeder;
use Database\Seeders\Hotel\HotelSeeder;
use Database\Seeders\Pilgrimage\PilgrimageBatchSeeder;
use Database\Seeders\Pilgrimage\PilgrimageTypeSeeder;
use Database\Seeders\Transportation\TransportationSeeder;
use Database\Seeders\Transportation\TransportationTripSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(TravelSeeder::class);

        $this->call(HotelSeeder::class);
        $this->call(HotelImageSeeder::class);

        $this->call(TransportationSeeder::class);
        $this->call(TransportationTripSeeder::class);

        $this->call(PilgrimageTypeSeeder::class);
        $this->call(PilgrimageBatchSeeder::class);
        $this->call(CustomerSeeder::class);


        if (app()->environment() === 'local') {
            $this->call(UsersTableSeeder::class);
        }
    }
}
