<?php

use Carbon\Carbon;

if (!function_exists('parsePassenger')) {
    function parsePassenger(string $input)
    {
        $parts = explode(' ', $input);
        $age = 0;
        $name = '';
        $city = [];

        foreach ($parts as $part) {
            if (is_numeric($part)) {
                $age = (int) $part;
            } else {
                if ($age == 0) {
                    $name .= $part . ' ';
                } else {
                    $city[] = $part;
                }
            }
        }
        $name = trim($name);
        $city = implode(' ', $city);

        return ['name' => $name, 'age' => $age, 'city' => $city];
    }
}

if (!function_exists('parseDate')) {
    function parseDate($tgl)
    {
        return Carbon::parse($tgl)->translatedFormat('l, d F Y');
    }
}

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka, $prefix = 'Rp ')
    {
        return $prefix . number_format($angka, 0, ',', '.');
    }
}

// if (!function_exists('generateBookingCode')) {
//     function generateBookingCode(int $travelId)
//     {
//         $date = Carbon::now()->format('ym'); // 2 digit tahun, 2 digit bulan
//         $travelId = str_pad($travelId, 4, '0', STR_PAD_LEFT);
//         $counter = Pasengger::where('travel_id', $travelId)->count() + 1;
//         $counter = str_pad($counter, 4, '0', STR_PAD_LEFT);

//         return $date . $travelId . $counter;
//     }
// }

if (!function_exists('generateFlightNumber')) {
    function generateFlightNumber(string $airlineCode = 'GA', int $lastNumber = 0): string
    {
        // Tambahkan leading zero (contoh: 7 jadi 007)
        $number = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        // Gabungkan dengan kode maskapai
        return strtoupper($airlineCode) . '-' . $number;
    }
}
