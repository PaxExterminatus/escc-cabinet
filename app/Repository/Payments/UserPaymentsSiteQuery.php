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


    /**
     * @return EloquentBuilder
     */
    function query(): EloquentBuilder
    {
        $query = Payment::whereUserId($this->userId);

        $query->orderBy('payments.created_at', 'desc');

        if ($this->clientId) $query->orWhere('payments.client_id', $this->clientId);

        return $query;
    }

    /**
     * @return Collection<Payment>
     */
    function get(): Collection
    {
        return $this->query()->get();
    }
}
