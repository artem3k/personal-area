<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Questionnaire
 *
 * @property int $id
 * @property int $user_id
 * @property string $q1
 * @property string $q2
 * @property string $q3
 * @property string $q4
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|Questionnaire newModelQuery()
 * @method static Builder|Questionnaire newQuery()
 * @method static Builder|Questionnaire query()
 * @method static Builder|Questionnaire whereCreatedAt($value)
 * @method static Builder|Questionnaire whereId($value)
 * @method static Builder|Questionnaire whereQ1($value)
 * @method static Builder|Questionnaire whereQ2($value)
 * @method static Builder|Questionnaire whereQ3($value)
 * @method static Builder|Questionnaire whereQ4($value)
 * @method static Builder|Questionnaire whereUpdatedAt($value)
 * @method static Builder|Questionnaire whereUserId($value)
 * @mixin Eloquent
 */
class Questionnaire extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'q1',
        'q2',
        'q3',
        'q4'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
