<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = ['title', 'type', 'url',];

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
