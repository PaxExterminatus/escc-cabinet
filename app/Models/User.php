<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int id
 * @property string email
 * @property string pass
 * @property int|null $group_id 0=dop, 1=full, 2=month, 3=free mail, 4=free download
 * @property string $login
 * @property string|null $fname
 * @property string|null $iname
 * @property string|null $oname
 * @property string|null $birthday
 * @property string|null $country
 * @property string|null $postindex
 * @property string|null $address
 * @property string|null $region
 * @property string|null $district
 * @property string|null $city
 * @property string|null $phone
 * @property int $active
 * @property string|null $date_register
 * @property int|null $f_reg_confirm
 * @property string|null $code
 * @property string|null $code_forget
 * @property string|null $date_forget
 * @property string|null $code_old
 * @property int|null $registered_on_campus
 * @property string|null $campus_error
 * @property string|null $efront_fingerprint
 * @property string|null $efront_error
 * @property string|null $test_efront_fingerprint
 * @property string|null $test_efront_error
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $online_error
 *
 *
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereActive($value)
 * @method static Builder|User whereAddress($value)
 * @method static Builder|User whereBirthday($value)
 * @method static Builder|User whereCampusError($value)
 * @method static Builder|User whereCity($value)
 * @method static Builder|User whereCode($value)
 * @method static Builder|User whereCodeForget($value)
 * @method static Builder|User whereCodeOld($value)
 * @method static Builder|User whereCountry($value)
 * @method static Builder|User whereDateForget($value)
 * @method static Builder|User whereDateRegister($value)
 * @method static Builder|User whereDeleted($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDistrict($value)
 * @method static Builder|User whereEfrontError($value)
 * @method static Builder|User whereEfrontFingerprint($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereFRegConfirm($value)
 * @method static Builder|User whereFname($value)
 * @method static Builder|User whereGroupId($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIname($value)
 * @method static Builder|User whereLogin($value)
 * @method static Builder|User whereOname($value)
 * @method static Builder|User whereOnlineError($value)
 * @method static Builder|User wherePass($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User wherePostindex($value)
 * @method static Builder|User whereRegion($value)
 * @method static Builder|User whereRegisteredOnCampus($value)
 * @method static Builder|User whereTestEfrontError($value)
 * @method static Builder|User whereTestEfrontFingerprint($value)
 *
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
