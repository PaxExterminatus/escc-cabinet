<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\Client\ClientRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private ClientRepository $clients;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clients = $clientRepository;
    }

    /**
     * @get /api/me
     * @param Request $request
     * @return JsonResponse
     */
    public function me(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();
        $id = (int)$user->code;
        $client = $this->clients->find($id);

        return response()->json([
            'client' => $client
        ]);
    }
}
