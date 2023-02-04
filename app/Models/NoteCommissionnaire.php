<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\NoteCommissionnaireFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\NoteCommissionnaire
 *
 * @property int $id
 * @property int $commissioner_id
 * @property int $note
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $commissioner
 * @method static NoteCommissionnaireFactory factory(...$parameters)
 * @method static Builder|NoteCommissionnaire newModelQuery()
 * @method static Builder|NoteCommissionnaire newQuery()
 * @method static Builder|NoteCommissionnaire query()
 * @method static Builder|NoteCommissionnaire whereCommissionerId($value)
 * @method static Builder|NoteCommissionnaire whereCreatedAt($value)
 * @method static Builder|NoteCommissionnaire whereId($value)
 * @method static Builder|NoteCommissionnaire whereNote($value)
 * @method static Builder|NoteCommissionnaire whereUpdatedAt($value)
 * @mixin Eloquent
 */
class NoteCommissionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'commissioner_id',
        'note',
    ];

    public function commissioner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
