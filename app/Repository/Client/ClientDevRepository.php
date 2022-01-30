<?php

namespace App\Repository\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientDevRepository implements ClientRepository
{
    function find(int $id): Client
    {
        $clientData = $this->devJsonFile('user');
        $client = new Client;
        $client->fill($clientData['client']);
        $client->courses = $clientData['client']['courses'];
        return $client;
    }

    protected function devJsonFile(string $filename): array
    {
        /** @var object $data */
        $path = Storage::path("dev/$filename.json");
        $content = file_get_contents($path);
        $data = json_decode($content, true);
        return $data;
    }
}
