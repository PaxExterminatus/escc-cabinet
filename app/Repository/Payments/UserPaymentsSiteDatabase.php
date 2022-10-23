<?php

namespace App\Repository\Payments;

use App\Models\Payment;
use App\Entities\MakeStaticTrait;
use Illuminate\Database\Eloquent\Builder;

class UserPaymentsSiteDatabase
{
    use UserPaymentsParamsTrait, MakeStaticTrait;

    public function __construct()
    {
        $this->constructParams();
    }

    protected array $columns = [
        'client_id as student',
        'iname as name',
        'fname as surname',
        'phone',
        'email',
        'price_total as amount',
        'created_at',
        'updated_at',
        'bill_status as status',
    ];

    function query(): Payment|Builder
    {
        $query = Payment::whereUserId($this->user_id->get());

        $query->select($this->columns);

        if ($this->client_id->get()) $query->orWhere('client_id', $this->client_id->get());

        return $query;
    }
}
