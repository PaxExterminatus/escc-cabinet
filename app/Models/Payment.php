<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Payment
 *
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property string client_id
 * @property string code
 * @property string iname
 * @property string fname
 * @property string phone
 * @property string email
 * @property float price_total
 * @property int bill_id
 * @property int bill_status
 * @property bool deleted
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 *
 * @method static EloquentBuilder|Payment newModelQuery()
 * @method static EloquentBuilder|Payment newQuery()
 * @method static EloquentBuilder|Payment query()
 * @method static EloquentBuilder|Payment whereBillId($value)
 * @method static EloquentBuilder|Payment whereBillStatus($value)
 * @method static EloquentBuilder|Payment whereCode($value)
 * @method static EloquentBuilder|Payment whereCreatedAt($value)
 * @method static EloquentBuilder|Payment whereDeleted($value)
 * @method static EloquentBuilder|Payment whereDeletedAt($value)
 * @method static EloquentBuilder|Payment whereEmail($value)
 * @method static EloquentBuilder|Payment whereFname($value)
 * @method static EloquentBuilder|Payment whereId($value)
 * @method static EloquentBuilder|Payment whereIname($value)
 * @method static EloquentBuilder|Payment wherePhone($value)
 * @method static EloquentBuilder|Payment wherePriceTotal($value)
 * @method static EloquentBuilder|Payment whereUpdatedAt($value)
 * @method static EloquentBuilder|Payment whereUserId($value)
 *
 * @mixin EloquentBuilder
 */
class Payment extends Model
{
    // Options ---------------------------------------------------------------------------------------------------------

    protected $table = 'payments';

    protected $fillable = [
        'user_id', 'client_id', 'code', 'iname', 'fname', 'phone', 'email',
        'price_total', 'bill_id', 'bill_status', 'deleted',
    ];

    // Accessors -------------------------------------------------------------------------------------------------------

    // Relations -------------------------------------------------------------------------------------------------------
}
