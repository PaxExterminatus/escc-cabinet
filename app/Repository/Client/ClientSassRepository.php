<?php


namespace App\Repository\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Http;

class ClientSassRepository implements ClientRepository
{
    protected string $host;

    function __construct()
    {
        $this->host = config('escc.service-host');
    }

    protected function url($path): string
    {
        return "$this->host{$path}";
    }

    function find(int $id): Client
    {
        $response = Http::get($this->url("client/{$id}"));
        $clientData = $response->json()['client'];

        return new Client($clientData);
    }
}
