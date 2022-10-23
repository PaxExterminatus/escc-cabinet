<?php

namespace App\Domain\Payments\Observers;

use App\Models\Payment;
use App\Domain\Payments\Provider\PaymentProvider;

class PaymentActualizationObserver
{
    protected PaymentProvider $provider;

    public function __construct(PaymentProvider $provider)
    {
        $this->provider = $provider;
    }

    function retrieved(Payment $payment)
    {
        if ($payment->bill_status === 0)
        {
            $data = $this->provider->getInvoice($payment->bill_id);
        }
    }
}
