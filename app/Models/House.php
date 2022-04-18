<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class House extends Model
{
    use HasFactory, HasKey, SoftDeletes;

    protected $guarded = [];

    public function image(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function categories(): BelongsToMany
    {
        return $this
            ->belongsToMany(Category::class, 'house_category')
            ->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
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
        $link = '<a href="'.route('categories.index', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->address;
        $link .= '</a>';
        return $link;
    }

    public function getCoordinateAttribute(): ?string
    {
        if ($this->address) {
            return $this->latitude.', '.$this->longitude;
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
}
