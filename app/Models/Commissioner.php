<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\CommissionerFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Commissioner
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $address
 * @property string|null $ville
 * @property string|null $images
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|House[] $apartments
 * @property-read int|null $apartments_count
 * @property-read User $user
 *
 * @method static CommissionerFactory factory(...$parameters)
 * @method static Builder|Commissioner newModelQuery()
 * @method static Builder|Commissioner newQuery()
 * @method static Builder|Commissioner query()
 * @method static Builder|Commissioner whereAddress($value)
 * @method static Builder|Commissioner whereCreatedAt($value)
 * @method static Builder|Commissioner whereEmail($value)
 * @method static Builder|Commissioner whereId($value)
 * @method static Builder|Commissioner whereImages($value)
 * @method static Builder|Commissioner wherePhoneNumber($value)
 * @method static Builder|Commissioner whereUpdatedAt($value)
 * @method static Builder|Commissioner whereUserId($value)
 * @method static Builder|Commissioner whereVille($value)
 *
 * @mixin Eloquent
 */
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
