<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];

    protected $casts = [
        'packages' => 'array',
        'reviews' => 'array',
    ];

    protected static function booted()
    {
        static::saved(fn () => \Illuminate\Support\Facades\Cache::forget('landing_templates'));
        static::deleted(fn () => \Illuminate\Support\Facades\Cache::forget('landing_templates'));
    }

    public function templateReviews()
    {
        return $this->hasMany(TemplateReview::class)->where('is_approved', true)->latest();
    }

    public function averageRating()
    {
        return $this->templateReviews()->avg('rating') ?? 0;
    }
}
