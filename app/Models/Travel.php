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
        'departure_date',
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
