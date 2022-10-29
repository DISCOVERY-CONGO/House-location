<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'note',
        'comment',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}
