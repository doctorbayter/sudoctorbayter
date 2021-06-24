<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Plan Premium 4 Fases - Método DKP',
            'slug' => 'plan-Premium-4-fases',
            'price_id' => 9,
            'discount_id' => 2
        ]);
        Plan::create([
            'name' => 'Plan Fase 1 - Método DKP',
            'slug' => 'plan-fase-1',
            'price_id' => 4
        ]);
        Plan::create([
            'name' => 'Plan Fase 2 y 3 - Método DKP',
            'slug' => 'plan-fase-2-y-3',
            'price_id' => 4
        ]);

        Plan::create([
            'name' => 'Chat Grupal WhatsApp',
            'slug' => 'chat-grupal-whatsApp',
            'price_id' => 3
        ]);

        Plan::create([
            'name' => 'Cita virtual 40 minutos',
            'slug' => 'cita-40',
            'price_id' => 6
        ]);

        Plan::create([
            'name' => 'Cita virtual 60 minutos',
            'slug' => 'cita-60',
            'price_id' => 7
        ]);

        Plan::create([
            'name' => 'Plan 7 Días - Método DKP',
            'slug' => 'plan-7-dias',
            'price_id' => 2
        ]);

    }
}
