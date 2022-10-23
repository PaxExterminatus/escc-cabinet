<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

use App\Domain\Payments\Models\Payment;
use App\Models\User;

class Bill extends BillStructure
{
    function __construct(private Payment $payment) {}

    function getEripId(): int
    {
        return 10282003;
    }

    function getFullName(): string
    {
        return "{$this->payment->iname} {$this->payment->fname}";
    }

    function getAmt(): float
    {
        return $this->payment->price_total;
    }

    function getCurr(): int
    {
        return 933;
    }

    function getStatusEnum(): int
    {
        return 1;
    }

    function getInvId(): string
    {
        return $this->payment->id;
    }
}
