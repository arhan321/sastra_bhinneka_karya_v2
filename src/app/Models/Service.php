<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'icon',
        'image_path',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeConstruction($query)
    {
        return $query->where('category', 'construction');
    }

    public function scopeNonConstruction($query)
    {
        return $query->where('category', 'non-construction');
    }
}
