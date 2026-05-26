<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn () => \Illuminate\Support\Facades\Cache::forget('landing_setting'));
        static::deleted(fn () => \Illuminate\Support\Facades\Cache::forget('landing_setting'));
    }
}
