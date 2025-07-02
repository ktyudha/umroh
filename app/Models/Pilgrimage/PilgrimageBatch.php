<?php

namespace App\Models\Pilgrimage;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class PilgrimageBatch extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'pilgrimage_type_id',
        'departure_date',
        'return_date',
        'duration',
        'price',
        'quota',
        'status',
        'image'
    ];

    public function pilgrimageType()
    {
        return $this->belongsTo(PilgrimageType::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->departure_date && $model->return_date) {
                $departure = Carbon::parse($model->departure_date);
                $return = Carbon::parse($model->return_date);
                $duration = $departure->toDateString() === $return->toDateString() ? 1 : $departure->diffInDays($return) + 1;
                $model->duration = $duration;
            }
        });
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('static/admin/images/default.png'); // fallback jika tidak ada gambar
    }
}
