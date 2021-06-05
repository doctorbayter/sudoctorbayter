<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create([
            'name' => 'Omelet Semi Primaveral',
            'slug' => 'omelet-semi-primaveral',
            'indice'=> 1,
            'carbs' => 2.27,
            'time' => 35,
            'level_id' => 1
        ]);
        Recipe::create([
            'name' => 'Salmón Verdoso',
            'slug' => 'salmon-verdoso',
            'indice'=> 1,
            'carbs' => 13.25,
            'time' => 35,
            'level_id' => 2
        ]);
        Recipe::create([
            'name' => 'Enhuevados Rellenos',
            'slug' => 'enhuevados-rellenos',
            'indice'=> 1,
            'carbs' => 1,
            'time' => 20,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Aceitunas',
            'slug' => 'aceitunas',
            'descripcion' => '<p>Puedes comer entre 7 a 10 aceitunas máximo</p>',
            'indice'=> 1,
            'carbs' => 1,
            'time' => 1,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Quesillo',
            'slug' => 'quesillo',
            'descripcion' => '<p>Una porción de 50 gramos de queso manchego o el que tengas (pero que sea graso y cero carbohidratos).<br/>Si lo deseas con un pocillo de café o té verde.</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Envuelticos',
            'slug' => 'envuelticos',
            'indice'=> 1,
            'carbs' => 2.58,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Zuquinis boloñesa',
            'slug' => 'zuquinis-bolonesa',
            'indice'=> 1,
            'carbs' => 13.12,
            'time' => 20,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Champiñones aquesados',
            'slug' => 'champinones-aquesados',
            'indice'=> 1,
            'carbs' => 1.89,
            'time' => 15,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Chicharrones',
            'slug' => 'chicharrones',
            'descripcion' => '<p>Una porción de chicharrones caseros de cerdo, pollo o el que se haga en tu país, pero que sea de animal <b>(máximo 50 gramos)</b>.</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 15,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Sándwich Entortillado',
            'slug' => 'sandwich-entortillado',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Pollo colorido',
            'slug' => 'pollo-colorido',
            'indice'=> 1,
            'carbs' => 10.9,
            'time' => 25,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Atún mexicano',
            'slug' => 'atun-mexicano',
            'indice'=> 1,
            'carbs' => 3,
            'time' => 15,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Pepinito picoso',
            'slug' => 'pepinito-picoso',
            'descripcion' => '<p>Toma 80 gramos de pepino y coloca en un pocillo un chorro de aceite de oliva, vinagre, sal y pimienta.<br/>Bate con un tenedor muy fuerte y rápido para que se incorporen todos. Y Espolvorea con más sal y pimienta.</p>',
            'indice'=> 1,
            'carbs' => 3,
            'time' => 5,
            'level_id' => 4
        ]);
        
        Recipe::create([
            'name' => 'Hongos portobello',
            'slug' => 'hongos-portobello',
            'indice'=> 1,
            'carbs' => 4,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Trucha al gusto',
            'slug' => 'trucha-al-gusto',
            'indice'=> 1,
            'carbs' => 9.88,
            'time' => 20,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Huevo al gusto',
            'slug' => 'huevo-al-gusto',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Quesillo envueltillo',
            'slug' => 'quesillo-envueltillo',
            'descripcion' => '<p> 40 gramos de queso para asar, partido en dos en forma de deditos. 2 lonchas, láminas o tiras de jamón serrano o tocino (50 gramos). 1 cucharada de mantequilla de vaca 100% de pastoreo. A la lonja de jamón, si lo deseas, se le esparce la mantequilla y se envuelve el queso ¡y a comer!</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Huevipinchos',
            'slug' => 'huevipinchos',
            'indice'=> 1,
            'carbs' => 1,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Alitas voladoras',
            'slug' => 'alitas-voladoras',
            'indice'=> 1,
            'carbs' => 12.57,
            'time' => 45,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Galletas chicharrón con queso',
            'slug' => 'galletas-chicharron-con-queso',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Papitas',
            'slug' => 'papitas',
            'descripcion' => '<p>Coloca 50 gramos de zuquini cortado en rodajas bien delgaditas (1,65 gr. CH) sobre un paño.<br/>Agrega sal, pimienta y deja por 12 minutos.<br/>Pasado este tiempo quita el líquido que suelta con un papel absorbente o un trapo, la clave está en secar muy bien y rocía con aceite de oliva.<br/>Llévalo al horno y lo dejas por lo menos 50 minutos o hasta que veas que están doradas y crocantes.<br/>En un tazón ponemos el queso, las aceitunas, perejil.<br/>Mezcla muy bien para que todo se incorpore y añade las gotas de ají.</p>',
            'indice'=> 1,
            'carbs' => 1.65,
            'time' => 62,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Albahaca entortillada',
            'slug' => 'albahaca-entortillada',
            'indice'=> 1,
            'carbs' => 1.56,
            'time' => 15,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'pizza',
            'slug' => 'pizza',
            'indice'=> 1,
            'carbs' => 16.83,
            'time' => 35,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Champiñones horneados',
            'slug' => 'champinones-horneados',
            'indice'=> 1,
            'carbs' => 2.2,
            'time' => 25,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Entortillado',
            'slug' => 'entortillado',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Merluza al ajillo con camarones',
            'slug' => 'merluza-al-ajillo-con-camarones',
            'indice'=> 1,
            'carbs' => 17.35,
            'time' => 30,
            'level_id' => 2
        ]);
        
        Recipe::create([
            'name' => 'Taco de Huevo',
            'slug' => 'taco-de-huevo',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 3
        ]);
        
        Recipe::create([
            'name' => 'Agua aromática',
            'slug' => 'agua-aromatica',
            'descripcion' => '<p>El agua aromatica que elijas debe ser natural y hierbas frescas ojo <b>NO DE FRUTAS</b></p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Huevos cuajados',
            'slug' => 'huevos-cuajados',
            'indice'=> 1,
            'carbs' => 1.8,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Corrientazo en hígado',
            'slug' => 'corrientazo-en-higado',
            'indice'=> 1,
            'carbs' => 14.8,
            'time' => 10,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Revuelto con tocineta',
            'slug' => 'revuelto-con-tocineta',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 15,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Pepinos laminitas',
            'slug' => 'pepinos-laminitas',
            'descripcion' => '<p>Combina el aceite, el vinagre y bate bien para que se unan los productos y agregas sal. coloca 80 gramos de pepino cortados en rodajas (con la piel) con la mezcla anterior y sal pimienta.</p>',
            'indice'=> 1,
            'carbs' => 2.88,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Rollitos de salmón ahumados',
            'slug' => 'rollitos-de-salmon-ahumados',
            'indice'=> 1,
            'carbs' => 2,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Pollo salteado con verduras',
            'slug' => 'pollo-salteado-con-verduras',
            'indice'=> 1,
            'carbs' => 15.59,
            'time' => 25,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Huevos enramados',
            'slug' => 'huevos-enramados',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 15,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Trocitos gratinados',
            'slug' => 'trocitos-gratinados',
            'indice'=> 1,
            'carbs' => 1.31,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Brócoli con lomo',
            'slug' => 'brocoli-con-lomo',
            'indice'=> 1,
            'carbs' => 13.94,
            'time' => 10,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Champiñones corrientes',
            'slug' => 'champinones-corrientes',
            'indice'=> 1,
            'carbs' => 1.98,
            'time' => 15,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Queso en aceite aromatizado',
            'slug' => 'queso-en-aceite-aromatizado',
            'descripcion' => '<p> 1 porción de no más de 40 gramos del queso con dos cucharadas</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Espárragos con tiras de salmón',
            'slug' => 'esparragos-con-tiras-de-salmon',
            'indice'=> 1,
            'carbs' => 2.34,
            'time' => 10,
            'level_id' => 1
        ]);
        Recipe::create([
            'name' => 'Ensalada pollo ketobayter',
            'slug' => 'ensalada-pollo-ketobayter',
            'indice'=> 1,
            'carbs' => 14.55,
            'time' => 20,
            'level_id' => 2
        ]);


        Recipe::create([
            'name' => 'Tociqueso',
            'slug' => 'tociqueso',
            'indice'=> 1,
            'carbs' => 0.56,
            'time' => 10,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Café',
            'slug' => 'cafe',
            'descripcion' => '<p>Café o té verde o agua</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);
        
        Recipe::create([
            'name' => 'Galletas con café',
            'slug' => 'galletas-con-cafe',
            'descripcion' => '<p>En un sartén redondo y pequeño a fuego bajo coloca el queso rallado bien esparcido<br/>Cuando el queso este burbujeando y se despegue fácil de la sartén, voltea y deja un minuto más por el otro lado<br/>Apaga y deja reposar durante un minuto antes de comer. Si deseas esparcir mantequilla</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Chicharrones de pollo',
            'slug' => 'chicharrones-de-pollo',
            'indice'=> 1,
            'carbs' => 0.24,
            'time' => 15,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Atún napolesko',
            'slug' => 'atun-napolesko',
            'indice'=> 1,
            'carbs' => 11.57,
            'time' => 15,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Pastelito keto',
            'slug' => 'pastelito-keto',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Tarta de aguacate y salmón',
            'slug' => 'tarta-de-aguacate-y-salmon',
            'indice'=> 1,
            'carbs' => 14.34,
            'time' => 20,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Ensalada de pollito y queso de cabra',
            'slug' => 'ensalada-de-pollito-y-queso-de-cabra',
            'indice'=> 1,
            'carbs' => 0.75,
            'time' => 25,
            'level_id' => 3
        ]);
        
        Recipe::create([
            'name' => 'Queso asado',
            'slug' => 'queso-asado',
            'descripcion' => '<p>60 gramos de queso para azar, busque un queso duro que no se deshaga en el sartén</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Huevos como se me dieron la gana',
            'slug' => 'huevos-como-se-me-dieron-la-gana',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 7,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Brucelas con langostinos',
            'slug' => 'brucelas-con-langostinos',
            'indice'=> 1,
            'carbs' => 15.65,
            'time' => 30,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Torti-champiñones',
            'slug' => 'torti-champinones',
            'indice'=> 1,
            'carbs' => 1.89,
            'time' => 15,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Jamón serrano con café',
            'slug' => 'jamon-serrano-con-cafe',
            'descripcion' => '<p>2 (50 gramos) lonjas de jamón serrano o bacon natural 1 pocillo de té, café o agua aromática</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);
        
        Recipe::create([
            'name' => 'Portobello relleno de huevo y tocineta',
            'slug' => 'portobello-relleno-de-huevo-y-tocineta',
            'indice'=> 1,
            'carbs' => 4.83,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Medallones de solomillo',
            'slug' => 'medallones-de-solomillo',
            'indice'=> 1,
            'carbs' => 14.69,
            'time' => 30,
            'level_id' => 2
        ]);
        
        Recipe::create([
            'name' => 'Empanadas de huevo',
            'slug' => 'empanadas-de-huevo',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Jamón serrano con queso',
            'slug' => 'jamon-serrano-con-queso',
            'descripcion' => '<p>2 (50 gramos) lonjas de jamón serrano acompañado de 30 gramos queso gruyer o de su gusto, pero graso</p>',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 5,
            'level_id' => 4
        ]);

        Recipe::create([
            'name' => 'Huevos en salsita',
            'slug' => 'huevos-en-salsita',
            'indice'=> 1,
            'carbs' => 3.64,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Salmón con salteado de verduras',
            'slug' => 'salmon-con-salteado-de-verduras',
            'indice'=> 1,
            'carbs' => 13.62,
            'time' => 30,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Pizcita de queso',
            'slug' => 'pizcita-de-queso',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 25,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Aguacate salmón mayonesa',
            'slug' => 'aguacate-salmon-mayonesa',
            'indice'=> 1,
            'carbs' => 5.25,
            'time' => 15,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Ropa vieja estilo mexicano',
            'slug' => 'ropa-vieja-estilo-mexicano',
            'indice'=> 1,
            'carbs' => 11.2,
            'time' => 35,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Huevitos revoltosos',
            'slug' => 'huevitos-revoltosos',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Deditos de queso',
            'slug' => 'deditos-de-queso',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Pernil con crema de cilantro',
            'slug' => 'pernil-con-crema-de-cilantro',
            'indice'=> 1,
            'carbs' => 16.71,
            'time' => 30,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Huevos estrellados con tocineta',
            'slug' => 'huevos-estrellados-con-tocineta',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Caldo de costilla con huevo',
            'slug' => 'caldo-de-costilla-con-huevo',
            'indice'=> 1,
            'carbs' => 3.28,
            'time' => 10,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Pizza coliforniana',
            'slug' => 'pizza-coliforniana',
            'indice'=> 1,
            'carbs' => 4.65,
            'time' => 40,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Champiñones rellenos',
            'slug' => 'champinones-rellenos',
            'indice'=> 1,
            'carbs' => 5.28,
            'time' => 30,
            'level_id' => 1
        ]);

        Recipe::create([
            'name' => 'Coliflor gratinado con albondigas',
            'slug' => 'coliflor-gratinado-con-albondigas',
            'indice'=> 1,
            'carbs' => 12.03,
            'time' => 35,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Espárragos con tocino en salsa de queso',
            'slug' => 'esparragos-con-tocino-en-salsa-de-queso',
            'indice'=> 1,
            'carbs' => 7.55,
            'time' => 15,
            'level_id' => 3
        ]);

        Recipe::create([
            'name' => 'Salmón al ajillo con camarones',
            'slug' => 'salmon-al-ajillo-con-camarones',
            'indice'=> 1,
            'carbs' => 16.84,
            'time' => 35,
            'level_id' => 2
        ]);

        Recipe::create([
            'name' => 'Huevos espolvoreados',
            'slug' => 'huevos-espolvoreados',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 3
        ]);
        
        //Bebidas

        Recipe::create([
            'name' => 'Shot Bayter',
            'slug' => 'shot-bayter',
            'indice'=> 1,
            'carbs' => 1,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Refrescante de hierbabuena',
            'slug' => 'refrescante-de-hierbabuena',
            'indice'=> 1,
            'carbs' => 2,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Refrescante de pepino',
            'slug' => 'refrescante-de-pepino',
            'indice'=> 1,
            'carbs' => 3.8,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Refrescante de sidra',
            'slug' => 'refrescante-de-sidra',
            'indice'=> 1,
            'carbs' => 2,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Refrescante de Apio',
            'slug' => 'refrescante-de-Apio',
            'indice'=> 1,
            'carbs' => 5.1,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Infusión de manzanilla',
            'slug' => 'infusión-de-manzanilla',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Infusión de cidrón',
            'slug' => 'infusión-de-cidron',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Infusión de toronjil',
            'slug' => 'infusión-de-toronjil',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Té de valeriana',
            'slug' => 'te-de-valeriana',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Té de tila',
            'slug' => 'te-de-tila',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Tequibayter',
            'slug' => 'tequibayter',
            'indice'=> 1,
            'carbs' => 3.26,
            'time' => 10,
            'level_id' => 5
        ]);

        Recipe::create([
            'name' => 'Bayter martini',
            'slug' => 'bayter-martini',
            'indice'=> 1,
            'carbs' => 2.05,
            'time' => 10,
            'level_id' => 5
        ]);

 
        //Sasitas

        Recipe::create([
            'name' => 'Mayonesa casera',
            'slug' => 'mayonesa-casera',
            'indice'=> 1,
            'carbs' => 2,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Salsa ranchera',
            'slug' => 'salsa-ranchera',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Salsa chimichurri',
            'slug' => 'salsa-chimichurri',
            'indice'=> 1,
            'carbs' => 0.24,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Salsa de aguacate',
            'slug' => 'salsa-de-aguacate',
            'indice'=> 1,
            'carbs' => 11.44,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Salsa vinagreta a la italina',
            'slug' => 'salsa-vinagreta-a-la-italina',
            'indice'=> 1,
            'carbs' => 1.48,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Salsa de queso',
            'slug' => 'salsa-de-queso',
            'indice'=> 1,
            'carbs' => 0.93,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Salsa cremosa de queso',
            'slug' => 'salsa-cremosa-de-queso',
            'indice'=> 1,
            'carbs' => 1,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Salsa picante',
            'slug' => 'salsa-picante',
            'indice'=> 1,
            'carbs' => 16,
            'time' => 10,
            'level_id' => 6
        ]);

        Recipe::create([
            'name' => 'Guacamole',
            'slug' => 'guacamole',
            'indice'=> 1,
            'carbs' => 18.41,
            'time' => 10,
            'level_id' => 6
        ]);

    }
}
