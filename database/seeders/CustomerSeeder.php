<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $haji = PilgrimageType::where('slug', 'haji')->first();
        $batch = PilgrimageBatch::first();

        Customer::create([
            'name' => 'Ahmad Syakir',
            'nik' => '3201234567890001',
            'email' => 'ahmad@example.com',
            'birth_place' => 'Bandung',
            'birth_date' => '1980-01-15',
            'gender' => 'male',
            'marital_status' => 'married',
            'phone' => '081234567890',
            'province' => 'Jawa Barat',
            'city' => 'Bandung',
            'district' => 'Coblong',
            'postal_code' => '40132',
            'address' => 'Jl. Sukajadi No. 123',
            'name_father' => 'H. Abdul',
            'name_mother' => 'Hj. Aminah',
            'name_partner' => 'Siti Nurhaliza',
            'children_count' => 3,
            'passport_number' => 'A1234567',
            'passport_issuer_date' => now()->subYears(1),
            'passport_expiry_date' => now()->addYears(4),
            'passport_place_issued' => 'Jakarta',
            'pilgrimage_type_id' => $haji->id,
            'pilgrimage_batch_id' => $batch->id,
        ]);
    }
}
