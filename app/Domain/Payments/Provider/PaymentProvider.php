<?php

namespace App\Domain\Payments\Provider;

use App\Domain\Payments\Provider\HutkiGrosh\HutkiGroshClient;

class PaymentProvider
{
    protected HutkiGroshClient $provider;

    function __construct()
    {
        $this->provider = new HutkiGroshClient;
    }

    function getInvoice(string $id): array|null
    {
        $response = $this->provider->getInvoice($id);
        $data = $response->json();



        return $data;
    }
}
