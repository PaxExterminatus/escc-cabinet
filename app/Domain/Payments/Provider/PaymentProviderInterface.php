<?php


namespace App\Domain\Payments\Provider;


interface PaymentProviderInterface
{
    function getInvoice(string $id);
}
