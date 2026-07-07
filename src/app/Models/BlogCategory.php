<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    protected $fillable = ['title', 'slug', 'is_active'];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->slug = Str::slug($model->title));
    }

    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'category', 'slug');
    }
}