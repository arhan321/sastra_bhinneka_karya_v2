<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitorLog extends Model
{
    protected $fillable = [
        'user_id',
        'ip_address',
        'method',
        'path',
        'full_url',
        'status_code',
        'user_agent',
        'referer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}