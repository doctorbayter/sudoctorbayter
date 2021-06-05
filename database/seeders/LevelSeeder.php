<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Level::create([
            'name' => 'Desayuno'
        ]);
        
        Level::create([
            'name' => 'Almuerzo'
        ]);

        Level::create([
            'name' => 'Cena'
        ]);

        Level::create([
            'name' => 'Snack'
        ]);
        
        Level::create([
            'name' => 'Bebida'
        ]);

        Level::create([
            'name' => 'Salsita'
        ]);
    }
}
