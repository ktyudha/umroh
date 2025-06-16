<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Travel;
use App\Models\Car;

class TravelSeeder extends Seeder
{
    public function run()
    {
        // Pastikan tersedia beberapa Car dahulu
        $cars = Car::all();

        if ($cars->isEmpty()) {
            $this->command->error('Silakan seeder Car terlebih dahulu');
            return;
        }

        $travels = [
            [
                // 'code' => '0001',
                'name' => 'Surabaya - Malang',
                'quota' => 10,
                'departure_date' => now()->addDay(1),
                'departure_time' => '08:15',
                'car_id' => $cars->first()->id,
            ],
            [
                // 'code' => '0002',
                'name' => 'Malang - Surabaya',
                'quota' => 15,
                'departure_date' => now()->addDay(2),
                'departure_time' => '09:30',
                'car_id' => $cars->skip(1)->first()->id,
            ],
            [
                // 'code' => '0003',
                'name' => 'Surabaya - Batu',
                'quota' => 20,
                'departure_date' => now()->addDay(3),
                'departure_time' => '07:45',
                'car_id' => $cars->skip(2)->first()->id,
            ],
        ];

        foreach ($travels as $data) {
            Travel::create($data);
        }
    }
}
