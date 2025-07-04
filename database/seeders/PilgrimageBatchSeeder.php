<?php

namespace Database\Seeders;

use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PilgrimageBatchSeeder extends Seeder
{
    public function run(): void
    {
        $haji = PilgrimageType::where('slug', 'haji')->first();
        $umroh = PilgrimageType::where('slug', 'umroh')->first();

        $batches = [
            [
                'pilgrimage_type_id' => $haji->id,
                'name' => 'Gelombang 1',
                'slug' => Str::slug('Gelombang 1'),
                'facility' => 'Tiket pesawat, akomodasi hotel, konsumsi, manasik',
                'requirement' => 'Sudah vaksin, membawa dokumen resmi',
                'terms_condition' => 'Pembayaran tidak dapat dikembalikan setelah pendaftaran.',
                'departure_date' => now()->addMonth(),
                'return_date' => now()->addMonths(2),
                'duration' => 40,
                'price' => 50000000,
                'quota' => 100,
                'status' => 'available',
            ],
            [
                'pilgrimage_type_id' => $umroh->id,
                'name' => 'Umroh Reguler',
                'slug' => Str::slug('Umroh Reguler'),
                'facility' => 'Tiket pesawat, hotel bintang 4, city tour Madinah & Mekkah',
                'requirement' => 'Paspor aktif, vaksin lengkap',
                'terms_condition' => 'Biaya dapat berubah sesuai kurs dollar dan kebijakan maskapai.',
                'departure_date' => now()->addWeeks(3),
                'return_date' => now()->addWeeks(5),
                'duration' => 12,
                'price' => 28500000,
                'quota' => 50,
                'status' => 'sold',
            ],
        ];

        foreach ($batches as $batch) {
            PilgrimageBatch::updateOrCreate(['slug' => $batch['slug']], $batch);
        }
    }
}
