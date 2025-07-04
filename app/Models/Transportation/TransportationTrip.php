<?php

namespace App\Models\Transportation;

use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Transportation\Transportation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TransportationTrip extends Model
{
    protected $fillable = [
        'transportation_id',
        'date_departure',
        'date_return',
        'from_airport',
        'to_airport',
        'flight_number',
        'status'
    ];

    protected function fromAirport(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtoupper($value),
        );
    }

    protected function toAirport(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtoupper($value),
        );
    }

    public static function generateFlightNumber(string $transportationCode = 'GA'): string
    {
        $transportationCode = strtoupper($transportationCode);
        $lastNumber = self::where('flight_number', 'LIKE', "{$transportationCode}-%")
            ->orderByDesc('id')
            ->value('flight_number');

        $lastNumber = $lastNumber ? (int) substr(strrchr($lastNumber, '-'), 1) : 0;

        return sprintf('%s-%03d', $transportationCode, $lastNumber + 1);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }

    public function pilgrimageBatches()
    {
        return $this->belongsToMany(PilgrimageBatch::class, 'pilgrimage_batch_trip');
    }
}
