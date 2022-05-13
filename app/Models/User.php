<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string $email
 * @property Carbon $birthday
 * @property Carbon $date_of_issue
 * @property string $birthday_place
 * @property int $series
 * @property int $number
 * @property string $issued_by
 * @property string $propiska
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Questionnaire|null $questionnaire
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereBirthday($value)
 * @method static Builder|User whereBirthdayPlace($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDateOfIssue($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIssuedBy($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereNumber($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePatronymic($value)
 * @method static Builder|User wherePropiska($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSeries($value)
 * @method static Builder|User whereSurname($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birthday',
        'birthday_place',
        'date_of_issue',
        'series',
        'number',
        'issued_by',
        'propiska',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['date_of_issue','birthday'];

    /**
     * Связь с анкетой
     * @return HasOne
     */
    public function questionnaire(): HasOne
    {
        return $this->hasOne(Questionnaire::class);
    }
}
