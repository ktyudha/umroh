<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pasengger extends Model
{
    protected $fillable = [
        'code',
        'name',
        'age',
        'city',
        'travel_id',
        'whatsapp',
        'birth_date',
        'pickup_location'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtoupper($value);
    }

    public static function generateBookingCode(int $travelId)
    {
        $date = Carbon::now()->format('ym');
        $counter = static::where('travel_id', $travelId)->count() + 1;
        $counter = str_pad($counter, 4, '0', STR_PAD_LEFT);
        $travelId = str_pad($travelId, 4, '0', STR_PAD_LEFT);

        return $date . $travelId . $counter;
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
