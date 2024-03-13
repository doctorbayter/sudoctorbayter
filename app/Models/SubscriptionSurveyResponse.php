<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionSurveyResponse extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_id', 'survey_id', 'has_completed', 'is_not_interested'];

    /**
     * La suscripción a la que pertenece esta respuesta.
     */
    public function subscription()
    {
        return $this->belongsTo('\App\Models\Subscription');
    }

    /**
     * La encuesta asociada a esta respuesta.
     */
    public function survey()
    {
        return $this->belongsTo('\App\Models\Survey');
    }

}
