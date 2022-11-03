<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Address;
use App\Enums\Detail;
use App\Enums\HouseEnum;
use Database\Factories\HouseFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\House
 *
 * @property int $id
 * @property int $user_id
 * @property int $prices
 * @property int|null $warranty_price
 * @property mixed $address
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int $status
 * @property string $reference
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $type_id
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read string|null $coordinate
 * @property-read string $map_popup_content
 * @property-read string $name_link
 * @property-read Collection|Image[] $image
 * @property-read int|null $image_count
 * @property-read Collection|HouseNote[] $notes
 * @property-read int|null $notes_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @property-read Type $type
 * @property-read User $user
 * @method static HouseFactory factory(...$parameters)
 * @method static Builder|House newModelQuery()
 * @method static Builder|House newQuery()
 * @method static Builder|House query()
 * @method static Builder|House whereAddress($value)
 * @method static Builder|House whereCreatedAt($value)
 * @method static Builder|House whereEmail($value)
 * @method static Builder|House whereId($value)
 * @method static Builder|House whereLatitude($value)
 * @method static Builder|House whereLongitude($value)
 * @method static Builder|House wherePhoneNumber($value)
 * @method static Builder|House wherePrices($value)
 * @method static Builder|House whereReference($value)
 * @method static Builder|House whereStatus($value)
 * @method static Builder|House whereTypeId($value)
 * @method static Builder|House whereUpdatedAt($value)
 * @method static Builder|House whereUserId($value)
 * @method static Builder|House whereWarrantyPrice($value)
 * @mixin Eloquent
 * @property string $detail
 * @method static Builder|House whereDetail($value)
 */
class House extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'prices',
        'warranty_price',
        'address',
        'detail',
        'latitude',
        'longitude',
        'status',
        'reference',
        'type_id',
        'user_id',
    ];

    protected $casts = [
        'address' => Address::class,
        'detail' => Detail::class
    ];

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    public function image(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function categories(): BelongsToMany
    {
        return $this
            ->belongsToMany(Category::class, 'house_category');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type(): BelongsTo
    {
        return $this
            ->belongsTo(Type::class, 'type_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function getNameLinkAttribute(): string
    {
        $title = __('app.show_detail_title', [
            'name' => $this->key, 'type' => __('outlet.outlet'),
        ]);
        $link = '<a href="' . route('categories.index', $this) . '"';
        $link .= ' title="' . $title . '">';
        $link .= $this->address;
        $link .= '</a>';

        return $link;
    }

    public function getCoordinateAttribute(): ?string
    {
        if ($this->address) {
            return $this->latitude . ', ' . $this->longitude;
        }

        return null;
    }

    public function getMapPopupContentAttribute(): string
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2 font-weight-bold text-red-900">
            <strong>' . 'Nom: ' . '</strong>
            <br>' . $this->address . '</div>';
        $mapPopupContent .= '<div class="my-2 font-weight-bold text-red-900">
            <strong>' . 'Commune: ' . '</strong>
            <br>' . $this->commune . '</div>';
        $mapPopupContent .= '<div class="my-2"><stroong>
            <a href="' . route('categories.show', $this->key) . '" title="' . $this->key . '">
                ' . 'Voir plus' . '
            </a>
        </stroong></div>';

        return $mapPopupContent;
    }

    public function notes(): HasMany
    {
        return $this->hasMany(HouseNote::class);
    }
}
