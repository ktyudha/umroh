<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class Car extends Model
{
    // use Sluggable;


    protected $fillable = [
        'name',
        'slug',
        'bbm',
        'seat',
        'tahun_pembelian',
        'image',
        'nopol',
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
