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
    'name' => 'Amor revuelto a la mexicana',
    'slug' => 'amor-revuelto-a-la-mexicana',
    'indice'=> 1,
    'carbs' => 3.42,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/amor-revuelto-a-la-mexicana.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '20 gramos de cebolla finamente picada (1,86 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1(2 gramos) chili o ají o jalapeño finamente picado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de tomate finamente picado (1,56 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '3 huevos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 (20 gramos) cucharadas de crema agria o queso crema',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo o aceite de coco',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Sal',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => '1Pones los huevos en un tazón, los bates y dejas conservando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '2En un sartén pones un poco de mantequilla o aceite',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '3Añades la cebolla, chili, tomate y sofritas por 1 minuto o hasta que la cebolla esté doradita',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '4Agregamos el queso crema, revuelves y dejas por 1 minuto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '5Viertes el huevo, agregamos sal y revuelves durante 2 minutos más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '6O hasta que esté la consistencia según tu gusto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '7Sirves de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(188, '49', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

//Fin Receta

$recipe = Recipe::create([
    'name' => 'Langostinos habichuelados',
    'slug' => 'langostinos-habichuelados',
    'indice'=> 1,
    'carbs' => 17.08,
    'time' => 20,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/langostinos-habichuelados.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '160 a 180 de gramos de langostinos para mujer y 200 a 230 gramos para hombre pre cocidos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '100 gramos de habichuelas o ejotes picados',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 ( 2 gramos) diente de ajo finamente picado ( 0,48 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '30 ml de zumo de limón',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Tomillo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Hojas de laurel preferiblemente frescas',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'medio pocillo de caldo de pescado o pollo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '20 gramos de cebolla finamente picada ( 1,86 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de tomate finamente picado(1,56 gr. CH finamente picado)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'salpimienta',
    'recipe_id' => $recipe->id
]);


$x = 0;
Instruction::create([
    'name' => 'Preparación langostinos habichuelados',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '1.	Pones a calentar agua con sal y zumo de limón',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '2.	Una vez el agua esté hirviendo pones los langostinos por 2 minutos, los retiras del agua y dejas conservando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '3.	Mientras en un sartén a fuego bajo con un poco de mantequilla pones el ajo a sofreír por dos minutos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '4.	Le agregas las habichuelas, las hojas de laurel revuelves por 1 minuto más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '5.	Agregamos el caldo y dejas cocinar por 15 minutos o hasta cuando las habichuelas estén al gusto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '6.	Dejas conservando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '7.	Simultáneamente en otro sartén a fuego bajo con otro poco de mantequilla pones la cebolla, tomate un poco más de albahaca a   sofreír por 1 minuto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '8.	Le agregamos los langostinos revuelves por 1 minuto más ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '9.	Agregar las habichuelas, salpimientas, revuelves por otro minuto más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '10.	Sirves de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Preparación ensalada',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '1.	En un tazón pones el yogur, el perejil y un chorro de aceite',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '2.	Revuelves muy bien para que todo se incorporé y dejas conservados',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '3.	Seguido en otro tazón pones las lechugas, tomate salpimientas y revuelves',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '4.	Le agregas la salsa de yogur, salpimientas y revuelves una vez más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '5.	Antes de servir agregamos el aguacate y un poco más de aceite de oliva',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => '6.	Sirves con tu plato fuerte de langostinos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(189, '49', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

//Fin Receta


$recipe = Recipe::create([
    'name' => 'Bolitas de champiñones',
    'slug' => 'bolitas-de-champinones',
    'indice'=> 1,
    'carbs' => 2.88,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/bolitas-de-champinones.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '80 gramos de champiñones enteros y limpios (2,64 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1(1 gramos) ajo finamente picado (0,24 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de tocino finamente picado  ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Salpimienta',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra virgen',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Pones a hervir agua con sal, y cuando el agua esté burbujeando agregas los champiñones por 5 minutos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Apagas, retiras y dejas conservando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén con mantequilla a fuego bajo pones el ajo y el tocino a sofreír por 2 minutos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregamos los champiñones, revuelves y cocinas por 3 minutos más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Antes de servir le roseas una buena cantidad de aceite aromatizado',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(190, '49', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

//Fin Receta


}); 