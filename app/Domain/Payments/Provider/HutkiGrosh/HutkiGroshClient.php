<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

use App\Domain\Payments\Provider\PaymentProviderInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HutkiGroshClient implements PaymentProviderInterface
{
    protected HutkiGroshEndpoint $endpoint;
    protected string $callback;

    protected array $headers = [
        'Accept' => 'application/json',
    ];

    function __construct()
    {
        $this->endpoint = HutkiGroshEndpoint::api();
        $this->callback = url('/api/payments/callback');
    }

    protected function login(): Response
    {
        $params = [
            'user' => config('escc.hg-user'),
            'pwd' => config('escc.hg-pass'),
        ];

        return Http::post($this->endpoint->login(), $params);
    }

    function logout() {
        Http::post($this->endpoint->logout());
    }

    function makeBill(BillStructure $bill): PromiseInterface|Response|null
    {
        $loginResponse = $this->login();
        $authorized = $loginResponse->body() === 'true';

        if ($authorized)
        {
            return Http::acceptJson()
                ->withOptions([
                    'cookies' => $loginResponse->cookies(),
                ])
                ->post($this->endpoint->bill(), $bill->toArray());
        }

        return null;
    }

    function getInvoice(string $id): Response|null
    {
        $loginResponse = $this->login();
        $authorized = $loginResponse->body() === 'true';

        if ($authorized)
        {
            return Http::post($this->endpoint->getBill($id));
        }

        return null;
    }
}
