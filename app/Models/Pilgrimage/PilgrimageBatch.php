<?php

namespace App\Models\Pilgrimage;

use App\Models\Customer;
use App\Models\Hotel\Hotel;
use App\Models\Itinerary;
use App\Models\Transportation\TransportationTrip;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class PilgrimageBatch extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'facility',
        'pilgrimage_type_id',
        'departure_date',
        'return_date',
        'duration',
        'price',
        'quota',
        'status',
        'requirement',
        'terms_condition',
        'image'
    ];

    protected $casts = [
        'departure_date' => 'date',
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

    public function getDurationAttribute()
    {
        if ($this->departure_date && $this->return_date) {
            $duration = Carbon::parse($this->departure_date)
                ->diffInDays(Carbon::parse($this->return_date)) + 1;
            return round($duration);
        }

        return null;
    }

    public function scopeFilter($query, $filters)
    {
        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }

        if (!empty($filters['departure_date'])) {
            $query->whereYear('departure_date', substr($filters['departure_date'], 0, 4))
                ->whereMonth('departure_date', substr($filters['departure_date'], 5, 2));
        }

        return $query;
    }

    public function pilgrimageType()
    {
        return $this->belongsTo(PilgrimageType::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'pilgrimage_batch_hotel')->withTimestamps();
    }

    public function transportationTrips()
    {
        return $this->belongsToMany(TransportationTrip::class, 'pilgrimage_batch_trip')->withTimestamps();
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class)->orderBy('date', 'asc');
    }
}
