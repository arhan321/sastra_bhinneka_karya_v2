<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'name',
        'slogan',
        'description',
        'history',
        'vision',
        'mission',
        'logo',
        'logo_path',
        'phone',
        'email',
        'address',
        'instagram',
        'facebook',
        'twitter',
        'google_map_url',
        'google_map_embed',
        'values',
    ];

    protected $casts = [
        'mission' => 'array',
        'values' => 'array',
    ];
}
