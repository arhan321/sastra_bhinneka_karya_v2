<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'content',
        'category',
        'author',
        'tags',
        'is_published',
        'published_at',
        'views',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'category' => 'array',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getTagsArrayAttribute(): array
    {
        if (!$this->tags) return [];
        return array_map('trim', explode(',', $this->tags));
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }
    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_post_id');
    }

    public function approvedComments()
    {
        return $this->hasMany(BlogComment::class, 'blog_post_id')->where('status', 'approved');
    }
}
