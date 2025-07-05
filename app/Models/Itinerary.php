<?php

namespace App\Models;

use App\Models\Pilgrimage\PilgrimageBatch;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = [
        'pilgrimage_batch_id',
        'location',
        'day_number',
        'date',
        'description',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected static function booted()
    {
        static::saved(function ($itinerary) {
            self::resetDayNumbers($itinerary->pilgrimage_batch_id);
        });

        static::deleted(function ($itinerary) {
            self::resetDayNumbers($itinerary->pilgrimage_batch_id);
        });
    }

    public static function resetDayNumbers($batchId)
    {
        $itineraries = self::where('pilgrimage_batch_id', $batchId)
            ->orderBy('date')
            ->get();

        foreach ($itineraries as $index => $itinerary) {
            $itinerary->day_number = $index + 1;
            $itinerary->saveQuietly(); // supaya tidak memicu event lagi
        }
    }

    public function pilgrimageBatch()
    {
        return $this->belongsTo(PilgrimageBatch::class);
    }
}
