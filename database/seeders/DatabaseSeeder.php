<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;
use App\Models\User;
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
        $this->call(PilgrimageType::class);
        $this->call(PilgrimageBatch::class);
        $this->call(Customer::class);


        if (app()->environment() === 'local') {
            $this->call(UsersTableSeeder::class);
        }
    }
}
