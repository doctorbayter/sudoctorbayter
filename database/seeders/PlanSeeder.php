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
            'price_id' => 4,
            'discount_id' => 1
        ]);
        Plan::create([
            'name' => 'Plan Fase 1 - Método DKP',
            'price_id' => 2
        ]);
        Plan::create([
            'name' => 'Plan Fase 2 y 3 - Método DKP',
            'price_id' => 3
        ]);

        Plan::create([
            'name' => 'Chat Grupal WhatsApp',
            'price_id' => 2
        ]);

        Plan::create([
            'name' => 'Evento Virtual DKP',
            'price_id' => 4
        ]);
    }
}
