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

        $subscribers = $this->manyChatService->getAllSubscribers();

        $filteredSubscribers = array_filter($subscribers, function ($subscriber) use ($name) {
            // Ajusta esta lógica de acuerdo a la estructura de tus datos
            return stripos($subscriber['name'], $name) !== false;
        });

        return response()->json(['subscribers' => $filteredSubscribers]);
    }
}
