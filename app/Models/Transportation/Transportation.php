<?php

namespace App\Models\Transportation;

use App\Models\Transportation\TransportationTrip;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Transportation extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'code',
        'slug',
        'class',
        'capacity',
        'image'
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

    public function trips()
    {
        $this->hasMany(TransportationTrip::class);
    }
}
