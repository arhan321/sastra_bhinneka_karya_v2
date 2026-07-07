<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'position',
        'company',
        'content',
        'rating',
        'photo',
        'is_visible',
        'sort_order',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'rating'     => 'integer',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
