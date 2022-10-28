<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemporaryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
