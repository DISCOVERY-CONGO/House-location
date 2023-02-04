<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ImageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property int $house_id
 * @property int $user_id
 * @property string|null $images
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read House $houses
 * @property-read User $user
 *
 * @method static ImageFactory factory(...$parameters)
 * @method static Builder|Image newModelQuery()
 * @method static Builder|Image newQuery()
 * @method static Builder|Image query()
 * @method static Builder|Image whereCreatedAt($value)
 * @method static Builder|Image whereHouseId($value)
 * @method static Builder|Image whereId($value)
 * @method static Builder|Image whereImages($value)
 * @method static Builder|Image whereUpdatedAt($value)
 * @method static Builder|Image whereUserId($value)
 *
 * @mixin Eloquent
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'images',
        'user_id',
        'house_id',
    ];

    public function houses(): BelongsTo
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
