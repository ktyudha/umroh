<?php

namespace Database\Seeders\Pilgrimage;

use App\Models\Pilgrimage\PilgrimageType;
use Illuminate\Database\Seeder;

class PilgrimageTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Haji',
                'slug' => 'haji',
                'description' => 'Perjalanan ibadah haji',
            ],
            [
                'name' => 'Umroh',
                'slug' => 'umroh',
                'description' => 'Perjalanan ibadah umroh',
            ],
        ];

        foreach ($types as $type) {
            PilgrimageType::updateOrCreate(['slug' => $type['slug']], $type);
        }
    }
}
