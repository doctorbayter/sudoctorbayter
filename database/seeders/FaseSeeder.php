<?php

namespace Database\Seeders;

use App\Models\Fase;
use Illuminate\Database\Seeder;

class FaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fase::create([
            'name' => 'Fase 1',
            'sub_name' => 'Keto<span class="text-red-700">Bayter</span>',
            'descripcion' => 'Vamos a desintoxicar nuestro organismo y a romper la adicción.',
            'slug' => 'fase-1',
        ]);
        Fase::create([
            'name' => 'Fase 2',
            'sub_name' => 'Lipo<span class="text-red-700">Bayter</span>',
            'descripcion' => 'Perderás mucha más grasa corporal y medidas.',
            'slug' => 'fase-2',
        ]);
        Fase::create([
            'name' => 'Fase 3',
            'sub_name' => 'Inter<span class="text-red-700">Bayter</span>',
            'descripcion' => 'La graduacion de este estilo de vida y nuestra razon de ser.',
            'slug' => 'fase-3',
        ]);
        Fase::create([
            'name' => 'Fase 4',
            'sub_name' => 'Keto<span class="text-red-700">Metabolismo</span>',
            'descripcion' => 'Vamos a resetear tu metabolistmo en 7 días',
            'slug' => 'fase-4',
        ]);
    }
}
