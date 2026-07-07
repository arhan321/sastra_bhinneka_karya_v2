<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'client_id',
        'image_path',
        'caption',
        'category',
        'sort_order',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
