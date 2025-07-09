<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $fillable = [
        'hotel_id',
        'image'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('static/admin/images/default.png'); // fallback jika tidak ada gambar
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
