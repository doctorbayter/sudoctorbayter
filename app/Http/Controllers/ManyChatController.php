<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ManyChatService;

class ManyChatController extends Controller
{
    protected $manyChatService;

    public function __construct(ManyChatService $manyChatService)
    {
        $this->manyChatService = $manyChatService;
    }

    public function handleRequest(Request $request)
    {
        // Suponiendo que recibes el nombre a través de una consulta GET o parámetro de solicitud
        $name = $request->query('name');

        if (!$name) {
            return response()->json(['message' => 'Nombre es requerido'], 400);
        }

        $subscriber = $this->manyChatService->getSubscriberByName($name);

        return response()->json(['subscribers' => $subscriber]);
    }
}
