<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

class InvoiceStatusResponseData
{
    public int $status;
    public int $purchase;

    function __construct(array $data)
    {
        $this->status = $data['status'];

        $status = $data['purchItemStatus'];

        if     ($status === 'PaymentPending')   $purchase = 1; // Ожидание оплаты
        elseif ($status === 'Outstending')      $purchase = 2; // Просроченный
        elseif ($status === 'DeletedByUser')    $purchase = 3; // Удален
        elseif ($status === 'PaymentCancelled') $purchase = 4; // Удален
        elseif ($status === 'Payed')            $purchase = 5; // Оплачен
        else                                    $purchase = 0;

        $this->purchase = $purchase;
    }

    static function make(array $data): static
    {
        return new static($data);
    }

    function success(): bool
    {
        return $this->status === 0;
    }
}
