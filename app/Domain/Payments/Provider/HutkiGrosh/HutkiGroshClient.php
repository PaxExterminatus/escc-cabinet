<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HutkiGroshClient
{
    protected PendingRequest $http;
    protected HutkiGroshEndpoint $endpoint;
    protected string $callback;
    protected PromiseInterface|Response $login;

    protected array $headers = [
        'Accept' => 'application/json',
    ];

    function __construct()
    {
        $this->endpoint = HutkiGroshEndpoint::api();
        $this->callback = url('/api/payments/callback');
        $this->http = Http::withOptions(['verify' => false])->withHeaders($this->headers);
    }

    protected function login(): bool
    {
        $params = [
            'user' => config('escc.hg-user'),
            'pwd' => config('escc.hg-pass'),
        ];

        $this->login = $this->http->post($this->endpoint->login(), $params);

        return $this->login->body() === 'true';
    }

    protected function logout(): void
    {
        Http::post($this->endpoint->logout());
    }

    function makeBill(BillStructure $bill): PromiseInterface|Response|null
    {
        if ($this->login())
        {
            return $this->http
                ->withOptions([
                    'cookies' => $this->login->cookies(),
                ])
                ->post($this->endpoint->bill(), $bill->toArray());
        }

        return null;
    }

    function getInvoice(string $id): Response|null
    {
        if ($this->login())
        {
            return $this->http
                ->withOptions([
                    'cookies' => $this->login->cookies(),
                ])
                ->get($this->endpoint->getBill($id));
        }

        return null;
    }

    function getInvoiceStatus($id): Response|null
    {
        if ($this->login())
        {
            return $this->http
                ->withOptions([
                    'cookies' => $this->login->cookies(),
                ])
                ->get($this->endpoint->billStatus($id));
        }

        return null;
    }
}
