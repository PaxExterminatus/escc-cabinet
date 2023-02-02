<?php

namespace App\Domain\Payments\Provider;

use App\Domain\Payments\Provider\HutkiGrosh\HutkiGroshClient;
use App\Domain\Payments\Provider\HutkiGrosh\InvoiceResponseData;

class PaymentProvider
{
    protected HutkiGroshClient $provider;

    function __construct()
    {
        $this->provider = new HutkiGroshClient;
    }

    function getInvoice(string $id): InvoiceResponseData
    {
        $response = $this->provider->getInvoice($id);
        $data = $response->json();
        return InvoiceResponseData::make($data);
    }
}
