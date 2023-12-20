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
        $email = $request->query('email');

        if (!$email) {
            return response()->json(['message' => 'Parametro (email) es requerido'], 400);
        }

        try {
            $subscriber = $this->manyChatService->findBySystemField($email);

            if (empty($subscriber) || empty($subscriber['data'])) {
                // Manejo cuando el usuario no se encuentra
                return [
                    'error' => true,
                    'message' => 'Usuario no encontrado'
                ];
            }

            return response()->json(['subscriber' => $subscriber]);

        } catch (\Exception $e) {
            // Manejo de otros errores
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
