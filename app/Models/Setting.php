<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public const ID = 'id';
    public const EN = 'en';
    public const NAME = 'name';
    public const ABOUT = 'about';
    public const EMAIL = 'email';
    public const MESSAGE = 'message';
    public const YOUTUBE = 'youtube';
    public const WHATSAPP = 'whatsapp';
    public const ADDRESS = 'address';
    public const GMAPS = 'gmaps';
    public const PIXEL = 'pixel';
    public const ANALYTICS = 'analytics';
    public const DESCRIPTION = 'description';
    public const META_DESCRIPTION = 'meta_description';
    public const LOGO = 'logo';
    public const LOGO_PRELOADER = 'logo_preloader';
    public const ICON = 'icon';
    public const OGIMAGE = 'ogimage';
    public const FILE = 'file';
    public const PROFILE = 'profile';
    public const SERVICE = 'service';
    public const PARTNER = 'partner';
    public const BLOG = 'blog';
    public const PAGE = 'page';
    public const CONTACT = 'contact';
    public const DOCTOR = 'doctor';
    public const PRODUCT = 'product';
    public const GALLERY = 'gallery';
    public const BANNER_SERVICE_SM = 'banner_service_sm';
    public const BANNER_SERVICE_LG = 'banner_service_lg';

    protected $fillable = [
        'key',
        'locale',
        'value',
        'additional_value',
        'json_value',
        'additional_json_value',
    ];

    public function scopeKey($query, $key)
    {
        return $query->where('key', $key);
    }

    public function scopeLocale($query, $lang)
    {
        return $query->whereLocale($lang);
    }

    public function getJsonValueAttribute($value)
    {
        return json_decode($value);
    }

    public function getAdditionalJsonValueAttribute($value)
    {
        return json_decode($value);
    }
}
