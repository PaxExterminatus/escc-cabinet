<?php

namespace App\Domain\Payments\Provider;

class PaymentProvider implements PaymentProviderInterface
{
    protected PaymentProviderInterface $provider;

    function __construct(PaymentProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    function getInvoice(string $id): array|null
    {
        $response = $this->provider->getInvoice($id);
        $data = $response->json();

        return [];
    }
}
