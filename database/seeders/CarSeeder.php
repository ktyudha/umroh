<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Avanza',
                'slug' => Str::slug('Avanza'),
                'nopol' => 'N 1234 ABC',
                'tahun_pembelian' => '2020',
                'seat' => '7',
                'bbm' => 'Bensin',
            ],
            [
                'name' => 'Innova',
                'slug' => Str::slug('Innova'),
                'nopol' => 'N 5678 XYZ',
                'tahun_pembelian' => '2019',
                'seat' => '7',
                'bbm' => 'Solar',
            ],
            [
                'name' => 'HiAce',
                'slug' => Str::slug('HiAce'),
                'nopol' => 'N 9999 QRS',
                'tahun_pembelian' => '2021',
                'seat' => '15',
                'bbm' => 'Solar',
            ],
        ];
        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
