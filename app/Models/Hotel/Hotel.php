<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Hotel extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'address',
        'rating',
        'gmap',
        'facility',
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


    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }
}
