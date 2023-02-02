<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

class InvoiceResponseData
{
    public int $status;
    public ?InvoiceResponseDataBill $bill;

    function __construct(array $data)
    {
        $this->status = $data['status'];

        $this->bill = $data['bill'] ? InvoiceResponseDataBill::make($data['bill']) : null;
    }

    static function make(array $data): static
    {
        return new static($data);
    }
}
