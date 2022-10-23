<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

class HutkiGroshEndpoint
{
    protected string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    static function api(): HutkiGroshEndpoint
    {
        $api = config('app.env') === 'production'
            ? 'https://www.hutkigrosh.by/api/v1/'
            : 'https://trial.hgrosh.by/api/v1/';

        return new HutkiGroshEndpoint($api);
    }

    function login(): string
    {
        return $this->url . 'Security/LogIn';
    }

    function logout(): string
    {
        return $this->url . 'Security/LogOut';
    }

    function bill(): string
    {
        return $this->url . 'Invoicing/Bill';
    }

    function getBill(string $id): string
    {
        return $this->url . "Invoicing/Bill($id)";
    }

    static function webPayPay(int $billId): string
    {
        return config('app.env') === 'production'
            ? "https://hutkigrosh.by/api/pay/webpaypay?id=$billId"
            : "https://trial.hgrosh.by/pay/webpaypay?id=$billId";
    }
}
