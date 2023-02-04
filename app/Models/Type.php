<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TypeFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|House[] $houses
 * @property-read int|null $houses_count
 * @method static TypeFactory factory(...$parameters)
 * @method static Builder|Type newModelQuery()
 * @method static Builder|Type newQuery()
 * @method static Builder|Type query()
 * @method static Builder|Type whereCreatedAt($value)
 * @method static Builder|Type whereId($value)
 * @method static Builder|Type whereName($value)
 * @method static Builder|Type whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function houses(): HasMany
    {
        return $this->hasMany(House::class);
    }
}
