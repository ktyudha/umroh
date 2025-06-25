<?php

namespace App\Models;

use App\Models\Pilgrimage\PilgrimageBatch;
use App\Models\Pilgrimage\PilgrimageType;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'nik',
        'email',
        'birth_place',
        'birth_date',
        'gender',
        'marital_status',
        'phone',
        'province',
        'city',
        'district',
        'postal_code',
        'address',
        'name_father',
        'name_mother',
        'name_partner',
        'children_count',
        'passport_number',
        'passport_issuer_date',
        'passport_expiry_date',
        'passport_place_issued',
        'pilgrimage_type_id',
        'pilgrimage_batch_id',
        'image',
        'kk',
        'ktp',
        'passport',
        'vaccine_certificate',
        'payment_proof',
    ];

    public function pilgrimageType()
    {
        return $this->belongsTo(PilgrimageType::class);
    }

    public function pilgrimageBatch()
    {
        return $this->belongsTo(PilgrimageBatch::class);
    }
}
