<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NoteCommissionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'commissioner_id',
        'note',
    ];

    public function commissioner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
