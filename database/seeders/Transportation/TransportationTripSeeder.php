<?php

namespace Database\Seeders\Transportation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transportation\Transportation;
use App\Models\Transportation\TransportationTrip;

class TransportationTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transport = Transportation::first();

        if ($transport) {
            TransportationTrip::create([
                'transportation_id' => $transport->id,
                'date_departure' => now()->addDays(14),
                'date_return' => now()->addDays(28),
                'from_airport' => 'CGK',
                'to_airport' => 'MED',
                'flight_number' => $transport->code . '-' . rand(100, 999),
                'status' => 'scheduled',
            ]);
        }
    }
}
