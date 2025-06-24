<?php

namespace App\Models\Pilgrimage;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PilgrimageType extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description'
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
}
