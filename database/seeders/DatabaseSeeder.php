<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(PilgrimageTypeSeeder::class);
        $this->call(PilgrimageBatchSeeder::class);
        $this->call(CustomerSeeder::class);


        if (app()->environment() === 'local') {
            $this->call(UsersTableSeeder::class);
        }
    }
}
