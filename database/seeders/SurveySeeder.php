<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('surveys')->insert([
            'title' => 'Encuesta de Satisfacción Plan 7 Días DKP',
            'url' => 'https://doctorbayter.typeform.com/to/GKbNJX6W',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
