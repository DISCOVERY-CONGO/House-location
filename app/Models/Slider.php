<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\SliderFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $images
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static SliderFactory factory(...$parameters)
 * @method static Builder|Slider newModelQuery()
 * @method static Builder|Slider newQuery()
 * @method static Builder|Slider query()
 * @method static Builder|Slider whereCreatedAt($value)
 * @method static Builder|Slider whereDescription($value)
 * @method static Builder|Slider whereId($value)
 * @method static Builder|Slider whereImages($value)
 * @method static Builder|Slider whereTitle($value)
 * @method static Builder|Slider whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'images',
        'description',
    ];

    public function images(): string
    {
        return asset('storage/'.$this->images);
    }
}
