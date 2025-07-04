<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transportation\Transportation;
use Illuminate\Support\Str;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation::create([
            'name' => 'Garuda Indonesia',
            'code' => 'GA',
            'slug' => Str::slug('Garuda Indonesia'),
            'class' => 'Economy',
            'capacity' => '350',
            'image' => 'https://example.com/images/garuda.png',
        ]);
    }
}
