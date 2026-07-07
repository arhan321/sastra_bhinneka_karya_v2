<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'page_slug',
        'meta_title',
        'meta_description',
        'og_image',
    ];

    public static function getForPage(string $slug): ?self
    {
        return static::where('page_slug', $slug)->first();
    }
}
