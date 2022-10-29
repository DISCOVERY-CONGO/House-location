<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commissioner extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'email',
        'address',
        'ville',
        'images',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function apartments(): HasMany
    {
        return  $this->hasMany(House::class);
    }
}
