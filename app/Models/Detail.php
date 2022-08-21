<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ElectricityEnum;
use App\Enums\ToiletEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'house_id',
        'number_rooms',
        'number_pieces',
        'toilet',
        'electricity',
        'description'
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}
