<?php

namespace App\Repository\Payments;

use App\Models\Payment;
use App\Entities\MakeStaticTrait;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class UserPaymentsSiteQuery
{
    use MakeStaticTrait;

    protected int $userId;
    protected int $clientId;

    function setUserId(mixed $id): static
    {
        $this->userId = (int)$id;
        return $this;
    }

    function setClientId(mixed $id): static
    {
        $this->clientId = (int)$id;
        return $this;
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
        'bill_id',
        'bill_status as status',
    ];

    /**
     * @return EloquentBuilder
     */
    function query(): EloquentBuilder
    {
        $query = Payment::whereUserId($this->userId);

        $query->select($this->columns);

        if ($this->clientId) $query->orWhere('client_id', $this->clientId);

        return $query;
    }

    /**
     * @return Collection<UserPaymentInterface>
     */
    function get(): Collection
    {
        return $this->query()->get();
    }
}
