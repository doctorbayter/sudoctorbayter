<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'url' => 'recipes/omelet-semi-primaveral.jpg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        Image::create([
            'url' => 'recipes/salmon-verdoso.jpg',
            'imageable_id' => 2,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        Image::create([
            'url' => 'recipes/enhuevados-rellenos.jpg',
            'imageable_id' => 3,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/aceitunas.jpg',
            'imageable_id' => 4,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/quesillo.jpg',
            'imageable_id' => 5,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/envuelticos.jpg',
            'imageable_id' => 6,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/zuquinis-bolonesa.jpg',
            'imageable_id' => 7,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/champinones-aquesados.jpg',
            'imageable_id' => 8,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/chicharrones.jpg',
            'imageable_id' => 9,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/sandwich-entortillado.jpg',
            'imageable_id' => 10,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pollo-colorido.jpg',
            'imageable_id' => 11,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/atun-mexicano.jpg',
            'imageable_id' => 12,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pepinito-picoso.jpg',
            'imageable_id' => 13,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        Image::create([
            'url' => 'recipes/hongos-portobello.jpg',
            'imageable_id' => 14,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/trucha-al-gusto.jpg',
            'imageable_id' => 15,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevo-al-gusto.jpg',
            'imageable_id' => 16,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/quesillo-envueltillo.jpg',
            'imageable_id' => 17,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevipinchos.jpg',
            'imageable_id' => 18,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/alitas-voladoras.jpg',
            'imageable_id' => 19,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        Image::create([
            'url' => 'recipes/galletas-chicharron-con-queso.jpg',
            'imageable_id' => 20,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/papitas.jpg',
            'imageable_id' => 21,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/albahaca-entortillada.jpg',
            'imageable_id' => 22,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pizza.jpg',
            'imageable_id' => 23,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/champinones-horneados.jpg',
            'imageable_id' => 24,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        Image::create([
            'url' => 'recipes/entortillado.jpg',
            'imageable_id' => 25,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/merluza-al-ajillo-con-camarones.jpg',
            'imageable_id' => 26,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/taco-de-huevo.jpg',
            'imageable_id' => 27,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/agua-aromatica.jpg',
            'imageable_id' => 28,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        Image::create([
            'url' => 'recipes/huevos-cuajados.jpg',
            'imageable_id' => 29,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/corrientazo-en-higado.jpg',
            'imageable_id' => 30,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/revuelto-con-tocineta.jpg',
            'imageable_id' => 31,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pepinos-laminitas.jpg',
            'imageable_id' => 32,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/rollitos-de-salmon-ahumados.jpg',
            'imageable_id' => 33,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pollo-salteado-con-verduras.jpg',
            'imageable_id' => 34,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevos-enramados.jpg',
            'imageable_id' => 35,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/trocitos-gratinados.jpg',
            'imageable_id' => 36,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/brocoli-con-lomo.jpg',
            'imageable_id' => 37,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/champinones-corrientes.jpg',
            'imageable_id' => 38,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/queso-en-aceite-aromatizado.jpg',
            'imageable_id' => 39,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/esparragos-con-tiras-de-salmon.jpg',
            'imageable_id' => 40,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/ensalada-pollo-ketobayter.jpg',
            'imageable_id' => 41,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/tociqueso.jpg',
            'imageable_id' => 42,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        Image::create([
            'url' => 'recipes/cafe.jpg',
            'imageable_id' => 43,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/galletas-con-cafe.jpg',
            'imageable_id' => 44,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/chicharrones-de-pollo.jpg',
            'imageable_id' => 45,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        Image::create([
            'url' => 'recipes/atun-napolesko.jpg',
            'imageable_id' => 46,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pastelito-keto.jpg',
            'imageable_id' => 47,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/tarta-de-aguacate-y-salmon.jpg',
            'imageable_id' => 48,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/ensalada-de-pollito-y-queso-de-cabra.jpg',
            'imageable_id' => 49,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/queso-asado.jpg',
            'imageable_id' => 50,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevos-como-se-me-dieron-la-gana.jpg',
            'imageable_id' => 51,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/brucelas-con-langostinos.jpg',
            'imageable_id' => 52,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/torti-champinones.jpg',
            'imageable_id' => 53,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/jamon-serrano-con-cafe.jpg',
            'imageable_id' => 54,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        Image::create([
            'url' => 'recipes/portobello-relleno-de-huevo-y-tocineta.jpg',
            'imageable_id' => 55,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/medallones-de-solomillo.jpg',
            'imageable_id' => 56,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/empanadas-de-huevo.jpg',
            'imageable_id' => 57,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/jamon-serrano-con-queso.jpg',
            'imageable_id' => 58,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevos-en-salsita.jpg',
            'imageable_id' => 59,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salmon-con-salteado-de-verduras.jpg',
            'imageable_id' => 60,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pizcita-de-queso.jpg',
            'imageable_id' => 61,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/aguacate-salmon-mayonesa.jpg',
            'imageable_id' => 62,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/ropa-vieja-estilo-mexicano.jpg',
            'imageable_id' => 63,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevitos-revoltosos.jpg',
            'imageable_id' => 64,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/deditos-de-queso.jpg',
            'imageable_id' => 65,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pernil-con-crema-de-cilantro.jpg',
            'imageable_id' => 66,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevos-estrellados-con-tocineta.jpg',
            'imageable_id' => 67,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/caldo-de-costilla-con-huevo.jpg',
            'imageable_id' => 68,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/pizza-coliforniana.jpg',
            'imageable_id' => 69,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/champinones-rellenos.jpg',
            'imageable_id' => 70,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/coliflor-gratinado-con-albondigas.jpg',
            'imageable_id' => 71,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        
        Image::create([
            'url' => 'recipes/esparragos-con-tocino-en-salsa-de-queso.jpg',
            'imageable_id' => 72,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salmon-al-ajillo-con-camarones.jpg',
            'imageable_id' => 73,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/huevos-espolvoreados.jpg',
            'imageable_id' => 74,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_01.jpg',
            'imageable_id' => 75,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_02.jpg',
            'imageable_id' => 76,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_03.jpg',
            'imageable_id' => 77,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_04.jpg',
            'imageable_id' => 78,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_05.jpg',
            'imageable_id' => 79,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_06.jpg',
            'imageable_id' => 80,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_07.jpg',
            'imageable_id' => 81,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_08.jpg',
            'imageable_id' => 82,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_09.jpg',
            'imageable_id' => 83,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_10.jpg',
            'imageable_id' => 84,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_11.jpg',
            'imageable_id' => 85,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/bebida_12.jpg',
            'imageable_id' => 86,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_01.jpg',
            'imageable_id' => 87,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_02.jpg',
            'imageable_id' => 88,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_03.jpg',
            'imageable_id' => 89,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_04.jpg',
            'imageable_id' => 90,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_05.jpg',
            'imageable_id' => 91,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_06.jpg',
            'imageable_id' => 92,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        Image::create([
            'url' => 'recipes/salsa_07.jpg',
            'imageable_id' => 93,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_08.jpg',
            'imageable_id' => 94,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        Image::create([
            'url' => 'recipes/salsa_09.jpg',
            'imageable_id' => 95,
            'imageable_type' => 'App\Models\Recipe',
        ]);
        
        
        
    }
}
