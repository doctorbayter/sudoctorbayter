<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Week::create([
            'name' => 'Semana 1',
        ]);
        Week::create([
            'name' => 'Semana 2',
        ]);
        Week::create([
            'name' => 'Semana 3',
        ]);
    }
}
