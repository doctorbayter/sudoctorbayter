<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function checkSurveyEligibility(Request $request, $userId)
    {
        $subscription = Subscription::where('user_id', $userId)
                            ->where('plan_id', 7)
                            ->whereDate('created_at', '<=', Carbon::now()->subDays(5))
                            ->first();
    
        if (!$subscription) {
            return response()->json(['eligible' => false]);
        }
    
        // Revisa si ya completó la encuesta o mostró desinterés
        $surveyResponse = $subscription->surveyResponses()->where('survey_id', 1)->first(); // Asumiendo ID de encuesta 1
        if ($surveyResponse && ($surveyResponse->has_completed || $surveyResponse->is_not_interested)) {
            return response()->json(['eligible' => false]);
        }

        // Encuesta elegible
        return response()->json([
            'eligible' => true,
            'surveyUrl' => 'https://doctorbayter.typeform.com/to/GKbNJX6W',
            'surveyId' => 1
        ]);
    }

    public function markSurveyStarted(Request $request, $userId)
    {
        $request->validate([
            'surveyId' => 'required|integer',
        ]);

        $surveyId = $request->input('surveyId');
        $subscription = Subscription::where('user_id', $userId)->first();

        if ($subscription) {
            $response = $subscription->surveyResponses()->create([
                'survey_id' => $surveyId,
                'has_completed' => true, // o `true` si prefieres manejarlo así
                'is_not_interested' => false,
            ]);

            return response()->json(['message' => 'Encuesta marcada como iniciada.']);
        }

        return response()->json(['message' => 'Suscripción no encontrada.'], 404);
    }


    public function declineSurvey(Request $request, $userId)
    {
        $request->validate([
            'surveyId' => 'required|integer',
        ]);

        $surveyId = $request->input('surveyId');

        // Aquí, busca la suscripción del usuario y marca la encuesta como declinada
        // Este es solo un ejemplo. Asegúrate de ajustar esto a tu lógica y modelos específicos.
        $subscription = Subscription::where('user_id', $userId)->first();

        if ($subscription) {
            $subscription->surveyResponses()->create([
                'survey_id' => $surveyId,
                'has_completed' => false,
                'is_not_interested' => true,
            ]);

            return response()->json(['message' => 'Encuesta declinada correctamente.']);
        }

        return response()->json(['message' => 'Error al declinar la encuesta.'], 500);
    }

}
