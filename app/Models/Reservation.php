<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ReservationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property int $house_id
 * @property int|null $user_id
 * @property int $status
 * @property string $messages
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $client_id
 * @property-read Client $client
 * @property-read House $house
 * @property-read Transaction|null $transaction
 * @property-read User|null $user
 * @method static ReservationFactory factory(...$parameters)
 * @method static Builder|Reservation newModelQuery()
 * @method static Builder|Reservation newQuery()
 * @method static Builder|Reservation query()
 * @method static Builder|Reservation whereClientId($value)
 * @method static Builder|Reservation whereCreatedAt($value)
 * @method static Builder|Reservation whereHouseId($value)
 * @method static Builder|Reservation whereId($value)
 * @method static Builder|Reservation whereMessages($value)
 * @method static Builder|Reservation whereStatus($value)
 * @method static Builder|Reservation whereUpdatedAt($value)
 * @method static Builder|Reservation whereUserId($value)
 * @mixin Eloquent
 */
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'status',
        'messages',
        'user_id',
        'client_id'
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
