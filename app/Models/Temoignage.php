<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TemoignageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Temoignage
 *
 * @property int $id
 * @property int $user_id
 * @property int $note
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 *
 * @method static TemoignageFactory factory(...$parameters)
 * @method static Builder|Temoignage newModelQuery()
 * @method static Builder|Temoignage newQuery()
 * @method static Builder|Temoignage query()
 * @method static Builder|Temoignage whereCreatedAt($value)
 * @method static Builder|Temoignage whereId($value)
 * @method static Builder|Temoignage whereNote($value)
 * @method static Builder|Temoignage whereUpdatedAt($value)
 * @method static Builder|Temoignage whereUserId($value)
 *
 * @mixin Eloquent
 */
class Temoignage extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
