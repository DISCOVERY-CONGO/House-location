<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Image extends Model
{
    use HasFactory, HasKey;

    public function houses(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}