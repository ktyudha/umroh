<?php

namespace App\Models\Hotel;

use App\Models\Pilgrimage\PilgrimageBatch;
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

    public function pilgrimageBatches()
    {
        return $this->belongsToMany(PilgrimageBatch::class, 'pilgrimage_batch_hotel');
    }
}
