<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
        Price::create([
            'name' => 'Gratis',
            'value' => 0
        ]);
        Price::create([
            'name' => '19.99 US$',
            'value' => 19.99
        ]);
        Price::create([
            'name' => '37 US$',
            'value' => 37
        ]);
        Price::create([
            'name' => '110 US$',
            'value' => 110
        ]);
        Price::create([
            'name' => '147 US$',
            'value' => 147
        ]);
        Price::create([
            'name' => '200 US$',
            'value' => 200
        ]);
        Price::create([
            'name' => '250 US$',
            'value' => 250
        ]);
        Price::create([
            'name' => '299 US$',
            'value' => 299
        ]);
        Price::create([
            'name' => '403 US$',
            'value' => 403
        ]);
    }
}
