<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\HouseNoteFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\HouseNote
 *
 * @property int $house_id
 * @property int $note
 * @property string|null $comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read House $house
 * @method static HouseNoteFactory factory(...$parameters)
 * @method static Builder|HouseNote newModelQuery()
 * @method static Builder|HouseNote newQuery()
 * @method static Builder|HouseNote query()
 * @method static Builder|HouseNote whereComment($value)
 * @method static Builder|HouseNote whereCreatedAt($value)
 * @method static Builder|HouseNote whereHouseId($value)
 * @method static Builder|HouseNote whereNote($value)
 * @method static Builder|HouseNote whereUpdatedAt($value)
 * @mixin Eloquent
 */
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
