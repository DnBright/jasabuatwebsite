<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PricingPackage extends Model
{
    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'price' => 'float',
    ];

    protected static function booted()
    {
        static::saved(fn () => Cache::forget('landing_packages'));
        static::deleted(fn () => Cache::forget('landing_packages'));
    }
}
