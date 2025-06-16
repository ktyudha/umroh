<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class Travel extends Model
{
    // use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'code',
        'seat',
        'quota',
        'car_id',
        'departure_date',
        'departure_time'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
