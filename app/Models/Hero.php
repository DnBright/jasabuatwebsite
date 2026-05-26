<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn () => \Illuminate\Support\Facades\Cache::forget('landing_hero'));
        static::deleted(fn () => \Illuminate\Support\Facades\Cache::forget('landing_hero'));
    }
}
