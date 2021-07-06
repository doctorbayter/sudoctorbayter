<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\UserRecipe;
use App\Models\Day;
use App\Models\Fase;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Recipe;
use App\Models\Week;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/doctor-bayter', [HomeController::class, 'doctor'])->name('doctor');
Route::get('/metodo-dkp', [HomeController::class, 'dkp'])->name('dkp');
Route::get('/programas', [HomeController::class, 'programas'])->name('programas');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/post/que-comer-y-que-evitar-en-una-dieta-cetogenica', [HomeController::class, 'blog_uno'])->name('blog.uno');
Route::get('/blog/post/5-beneficios-que-no-conocias-de-la-dieta-cetogenica', [HomeController::class, 'blog_dos'])->name('blog.dos');
Route::get('/blog/post/como-saber-si-estas-en-cetosis', [HomeController::class, 'blog_tres'])->name('blog.tres');
Route::get('/recursos', [HomeController::class, 'recursos'])->name('recursos');
Route::get('/cita', [HomeController::class, 'cita'])->name('cita');
Route::get('/what', [HomeController::class, 'what'])->name('what');
Route::get('/recipe/{recipe}', UserRecipe::class)->name('recipe');

Route::get('/110', function () {
    return view('no-disponible');
});

//php artisan migrate:fresh --seed --force

Route::get('x/sql', function(){
    
    $weeks = DB::table('fase_week')->get();
    dd($weeks);
 
});

Route::get('x/query', function(){

    //$row = DB::table('day_recipe')->where('id', '=', '36')->update(['meal' => 1]);

    //DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (4, '3', '1', CURRENT_TIMESTAMP, NULL)");

    /*
    Day::create([
        'day' => 1,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 2,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 3,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 4,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 5,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 6,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 7,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 8,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 9,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 10,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 11,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 12,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 13,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 14,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 15,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 16,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 17,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 18,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 19,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);
    Day::create([
        'day' => 20,
        'fase_id' => 3,
    ]);
    Day::create([
        'day' => 21,
        'fase_id' => 3,
        'note' => '<p>Esta es la fase de ayunos, recuerda no vas a desayunar rompes el ayuno con algo ligero (snack) y una o dos horas después almuerzas.</p>',
    ]);

    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (43, '3', '43', CURRENT_TIMESTAMP, NULL),
    (44, '3', '44', CURRENT_TIMESTAMP, NULL),
    (45, '3', '45', CURRENT_TIMESTAMP, NULL),
    (46, '3', '46', CURRENT_TIMESTAMP, NULL),
    (47, '3', '47', CURRENT_TIMESTAMP, NULL), 
    (48, '3', '48', CURRENT_TIMESTAMP, NULL),
    (49, '3', '49', CURRENT_TIMESTAMP, NULL),
    (50, '3', '50', CURRENT_TIMESTAMP, NULL),
    (51, '3', '51', CURRENT_TIMESTAMP, NULL),
    (52, '3', '52', CURRENT_TIMESTAMP, NULL),
    (53, '3', '53', CURRENT_TIMESTAMP, NULL),
    (54, '3', '54', CURRENT_TIMESTAMP, NULL),
    (55, '3', '55', CURRENT_TIMESTAMP, NULL),
    (56, '3', '56', CURRENT_TIMESTAMP, NULL),
    (57, '3', '57', CURRENT_TIMESTAMP, NULL),
    (58, '3', '58', CURRENT_TIMESTAMP, NULL),
    (59, '3', '59', CURRENT_TIMESTAMP, NULL),
    (60, '3', '60', CURRENT_TIMESTAMP, NULL),
    (61, '3', '61', CURRENT_TIMESTAMP, NULL),
    (62, '3', '62', CURRENT_TIMESTAMP, NULL),
    (63, '3', '63', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES 
    (43, '43', '1', CURRENT_TIMESTAMP, NULL),
    (44, '44', '1', CURRENT_TIMESTAMP, NULL),
    (45, '45', '1', CURRENT_TIMESTAMP, NULL),
    (46, '46', '1', CURRENT_TIMESTAMP, NULL),
    (47, '47', '1', CURRENT_TIMESTAMP, NULL),
    (48, '48', '1', CURRENT_TIMESTAMP, NULL),
    (49, '49', '1', CURRENT_TIMESTAMP, NULL),
    (50, '50', '2', CURRENT_TIMESTAMP, NULL),
    (51, '51', '2', CURRENT_TIMESTAMP, NULL),
    (52, '52', '2', CURRENT_TIMESTAMP, NULL),
    (53, '53', '2', CURRENT_TIMESTAMP, NULL),
    (54, '54', '2', CURRENT_TIMESTAMP, NULL),
    (55, '55', '2', CURRENT_TIMESTAMP, NULL),
    (56, '56', '2', CURRENT_TIMESTAMP, NULL),
    (57, '57', '3', CURRENT_TIMESTAMP, NULL),
    (58, '58', '3', CURRENT_TIMESTAMP, NULL),
    (59, '59', '3', CURRENT_TIMESTAMP, NULL),
    (60, '60', '3', CURRENT_TIMESTAMP, NULL),
    (61, '61', '3', CURRENT_TIMESTAMP, NULL),
    (62, '62', '3', CURRENT_TIMESTAMP, NULL),
    (63, '63', '3', CURRENT_TIMESTAMP, NULL);");


    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    (7, '3', '1', 'files/pdf/lista-de-alimentos-fase-3-1-dkp.pdf', CURRENT_TIMESTAMP, NULL),
    (8, '3', '2', 'files/pdf/lista-de-alimentos-fase-3-2-dkp.pdf', CURRENT_TIMESTAMP, NULL),
    (9, '3', '3', 'files/pdf/lista-de-alimentos-fase-3-3-dkp.pdf', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    (6, 'Lista de Alimentos Fase 3', 'files/pdf/lista-de-alimentos-fase-3-dkp.pdf', '3', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL),
    (7, 'Secretos Fase 3', 'files/pdf/secretos-fase-3-dkp.pdf', '3', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");
*/


$recipe = Recipe::create([
    'name' => 'Tarta espinaranja',
    'slug' => 'tarta-espinaranja',
    'indice'=> 1,
    'carbs' => 14.03,
    'time' => 15,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/tarta-espinaranja.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '60 gramos de espinacas (0,84 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de champiñones laminados (1,65 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 huevos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '3 cucharadas, (30 gramos), de queso crema',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 diente de ajo, (1 gramo), finamente picado (0,24 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '20 gramos de cebolla picada a la juliana (1,86 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 (80 gramos) de naranja (9,44 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Ralladura de naranja',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra virgen',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Sal pimienta ',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'En un sartén con mantequilla y a fuego bajo sofríes el ajo y la cebolla por 1 minuto o hasta que dore',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Añades las espinacas, champiñones, queso crema y salpimientas, revuelves  ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Una vez estén cocidas las espinacas y champiñones, añades la ralladura de la naranja ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Revolvemos y dejamos 1 minuto más y apagamos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un tazón pones los huevos, agregamos lo que cocinaste en el sartén y revuelves (espinacas y champiñones)  ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Seguido viertes todo en una refractaria previamente con mantequilla',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Llevas al horno por 15 minutos o hasta que cuando introduzcas un cuchillo este salga ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves de inmediato con la naranja partida en 4',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(185, '48', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

//Fin Receta

$recipe = Recipe::create([
    'name' => 'Sencillamente mollejas',
    'slug' => 'sencillamente-mollejas',
    'indice'=> 1,
    'carbs' => 23.1,
    'time' => 25,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/sencillamente-mollejas.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '180 a 220 de gramos de mollejas para mujer y 220 a 260 gramos para hombre',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '30 ml de zumo de limón',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de cebolla partida en dos (4,72 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '25 gramos de pimentón partido en dos (1,9 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1(4 gramos) diente de ajo finamente picado (0,98 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de apio en rama, todo el tallo y la hoja (1,55 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de tomate partido en dos (1,95 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => ' Hojas de laurel',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Cilantro',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Caldo de pollo o carne',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Ingredientes para el arroz de coliflor',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '120 gramos de coliflor (3,72 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 (2 gramos) diente de ajo finamente picado (0,48 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1-2 cucharadita de perejil finamente picada',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Salpimienta',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Ingredientes ensalada',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '80 gramos de aguacate (6,8 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '7 a 10 aceitunas (1 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Media cucharadita de cilantro finamente picada ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra virgen',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Preparación de las mollejas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Limpias las mollejas muy bien y dejas en agua limón por 30 minutos mínimo',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Simultáneamente pones en la licuadora o procesadora, el tomate, pimentón, rama de apio, cebolla licuas y dejas conservando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Secas las mollejas y cortas a la mitad o en tres si están muy grandes',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén con mantequilla o manteca de cero y a fuego alto sellas las mollejas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Una vez selladas bajas el fuego y añades media taza de caldo y dejas cocinar por 15 minutos, hasta que el caldo reduzca',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En otro sartén y a fuego bajo pones a sofreír en mantequilla o manteca el ajo por dos minutos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Añades las mollejas, las hojas de laurel, la otra mitad del caldo, el licuado de cebolla, apio, pimenton, tomate que tenias conservando y salpimientas ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Cocinas durante 35 minutos a fuego medio y vas revolviendo constantemente para evitar que se pegue',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Durante este tiempo vas probando si las mollejas están blandas, si están bien de sal',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Una vez blandas, le aumentas la llama al máximo y dejas por 7 minutos más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Apagas y tapas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Preparación del arroz de coliflor',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Limpiamos la coliflor y dejas solo la parte blanca',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pones la coliflor en un procesador o licuadora y lo dejas en pedacitos es decir bien licuado',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Si no tienes esta opción lo puedes hacer manual con un rallador por la parte de los huecos gruesa',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén con mantequilla o aceite de coco sofreímos el ajo y el perejil por 1 minuto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregamos la coliflor revuelves y cocinas por 2 minutos más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Antes de apagar le agregas media cucharadita de mantequilla de vaca, apagas y tapas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Preparación ensalada',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pones en un tazón el aguacate, anexas las aceitunas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Rocias con el cilantro, salpimentar y bañar con aceite y revuelves',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Ya con todo listo sirves las mollejas, el arroz de coliflor y la ensalada ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(186, '48', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

//Fin Receta


$recipe = Recipe::create([
    'name' => 'Tociaquesados',
    'slug' => 'tociaquesados',
    'indice'=> 1,
    'carbs' => 0,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/tociaquesados.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '2 porciones de queso para asar o el que tengas en casa cada uno de 35 gramos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 (50 gramos) lonjas o lonjas de tocino',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva aromatizado',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Debes dejar en el congelado cada uno de los quesos mínimo 1 hora',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Una vez congelados, envuelves cada uno de los quesos con las lonjas de tocino',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén pequeño con un poquito de mantequilla pones cada uno de los envueltos de queso a sofreír',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Dejas hasta que el tocino esté dorado y el queso empiece a derretir',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Estar atento pues el queso debe quedar derretido, pero no deshecho',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(187, '48', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

//Fin Receta


}); 