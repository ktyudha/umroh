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
    function formatRupiah($angka, $prefix = 'Rp ', $endPrefix = '')
    {
        return $prefix . number_format($angka, 0, ',', '.') . $endPrefix;
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

function remove_emojis($string)
{
    return preg_replace('/[\x{1F300}-\x{1FAFF}\x{1F1E6}-\x{1F1FF}]/u', '', $string);
}

if (!function_exists('read_more')) {
    /**
     * Site URL
     *
     * Create a local URL based on your basepath. Segments can be passed via the
     * first parameter either as a string or an array.
     *
     * @param	string	$uri
     * @param	string	$protocol
     * @return	string
     */
    function read_more($string, $limit = 100)
    {
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = trim(preg_replace('/\t+/', '', $string));
        $d = array('&nbsp;', '&quot;', '&amp;', '&ldquo;', '&rdquo;');
        $string = str_replace($d, ' ', $string); // Hilangkan karakter di array $d
        $length = strlen(strip_tags($string));
        if ($length > $limit) {
            //  $isi_string = htmlentities(strip_tags($string)); // membuat paragraf pada isi berita dan mengabaikan tag html
            $isi_string = strip_tags($string); // membuat paragraf pada isi berita dan mengabaikan tag html&rdquo;
            $isi = substr($isi_string, 0, $limit); // ambil sebanyak 220 karakter
            $isi = substr($isi_string, 0, strrpos($isi, " ")) . ' ... '; // potong per spasi kalimat

            return $isi;
        } else {
            return strip_tags($string);
        }
    }
}
if (!function_exists('load_more')) {
    function load_more($string, $limit = 200)
    {
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = trim(preg_replace('/\t+/', '', $string));
        $d = array('&nbsp;', '&quot;', '&amp;', '&ldquo;', '&rdquo;');
        // $string = str_replace($d,' ',$string);// Hilangkan karakter di array $d
        $length = strlen(strip_tags($string));
        if ($length > $limit) {
            //  $isi_string = htmlentities(strip_tags($string)); // membuat paragraf pada isi berita dan mengabaikan tag html
            // $isi_string = strip_tags($string); // membuat paragraf pada isi berita dan mengabaikan tag html&rdquo;
            $isi = substr($string, 0, $limit); // ambil sebanyak 200 karakter
            $isi = substr($string, 0, strrpos($isi, " ")) . ' ... '; // potong per spasi kalimat

            return $isi;
        } else {
            return strip_tags($string);
        }
    }
}
