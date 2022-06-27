<?php

namespace App\Repository\Payments;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;

class PaymentsSite
{
    protected int $userId;
    protected int $clientId;

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

    static function make(): static
    {
        return new static;
    }

    function setUserId(int|string $userId): static
    {
        $this->userId = (int)$userId;
        return $this;
    }

    function setClientId(int|string $clientId): static
    {
        $this->clientId = (int)$clientId;
        return $this;
    }

    function query(): Payment|Builder
    {
        $query = Payment::whereUserId($this->userId);

        $query->select($this->columns);

        if ($this->clientId) $query->orWhere('client_id', $this->clientId);

        return $query;
    }
}
