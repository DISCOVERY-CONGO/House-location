<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\TemporaryImage
 *
 * @property int $id
 * @property int $user_id
 * @property string $file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|TemporaryImage newModelQuery()
 * @method static Builder|TemporaryImage newQuery()
 * @method static Builder|TemporaryImage query()
 * @method static Builder|TemporaryImage whereCreatedAt($value)
 * @method static Builder|TemporaryImage whereFile($value)
 * @method static Builder|TemporaryImage whereId($value)
 * @method static Builder|TemporaryImage whereUpdatedAt($value)
 * @method static Builder|TemporaryImage whereUserId($value)
 * @mixin Eloquent
 */
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
