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
    'name' => 'Chicharrones de pollo con aguacate',
    'slug' => 'chicharrones-de-pollo-con-aguacate',
    'indice'=> 1,
    'carbs' => 4.49,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/chicharrones-de-pollo-con-aguacate.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '120 gramos piel de pollo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1/2 cucharadita de ajo en polvo (0,24 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Especies al gusto (opcional)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Salpimienta',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de aguacate (4,25 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Gotas de limón ',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Precalentar el horno a 200º, si no hay horno se puede hacer en un sartén normal a fuego medio',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Colocar las pieles de pollo abiertas en una bandeja que pueda estar en el horno',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Rociar el ajo, las especias y sal pimentar.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Hornear durante 15 minutos o hasta que queden crocantes rociar con el limón, servir acompañado de trocitos de aguacate',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(182, '47', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

//Fin Receta

$recipe = Recipe::create([
    'name' => 'Hambur ketoromana',
    'slug' => 'hambur-ketoromana',
    'indice'=> 1,
    'carbs' => 14.17,
    'time' => 20,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/hambur-ketoromana.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '100 gramos de carne molida de res adobada al gusto',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '100 gramos de carne molida de cerdo adobado al gusto',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 huevo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 lonjas o lonchas (40 gramos) queso holandés o el que tengas en casa preferiblemente graso',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 lonjas o lonchas (50 gramos) de tocino o panceta, preferiblemente en tiras',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 (20 gramos) cucharadas crema agria',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '80 gramos de aguacate picada en cuadritos (8,5 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de tomate en rodajas en rodajas (1,95 gr. CH) ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de cebolla en rodajas (3,72 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 a 3 hojas grandes de lechuga lisa romana',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Con anterioridad mezclas la carne de res, cerdo y la haces en forma de hamburguesa y dejas conservando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén pones a freír el huevo según tu gusto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En otro sartén pones a sofreír la panceta durante 8 minutos, retiramos y dejamos a parte',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En este mismo sartén con la grasita de la panceta y dos cucharadas de mantequilla pones la cebolla y el tomate',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Salpimientas y dejas sofreír por 5 minutos o hasta que veas que el tomate ha soltado color apagas y dejas tapado',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén adicional y con un poco de mantequilla pones a sofreír la hamburguesa por lado y lado',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Cuando esté soltando los jugos de la carne le pones una loncha de queso',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Seguido le agregas la cebolla y el tomate que tenías en el sartén y una loncha de queso adicional',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Tapas y dejas que el queso derrita',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Mientras está lista la carne pones en un plato pando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Las hojas de lechugas en forma de cama, le agregas una cucharada de crema agria',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Encima la hamburguesa que tienes lista, le agregamos el tocino, el huevo',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Le agregamos el aguacate, salpimientas y una vez más le agregas crema agria',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(183, '47', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

//Fin Receta

$recipe = Recipe::create([
    'name' => 'Muffins sorpresa',
    'slug' => 'muffins-sorpresa',
    'indice'=> 1,
    'carbs' => 0.9,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/muffins-sorpresa.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => ' 3 (30 gramos) cucharadas   queso rallado tipo cheddar o parmesano',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 huevos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 (10 gramos) cucharada de queso crema',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de tocino finamente picado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '20 gramos de champiñones finamente picado (0,66 gr. CH) ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 (1 gramo) diente de ajo finamente picado (0,24 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Salpimienta',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Precalentar el horno a 180°C.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén 1 cucharadita de mantequilla pones a sofreír el ajo, champiñones, tocineta hasta que esté dorado y dejas conservando',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un tazón agregamos el huevo el queso rallado, queso crema salpimientas y revuelves',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Colocamos la mezcla en un molde de muffin llevas al horno ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Por 8 minutos o hasta que quede esponjoso y dorado',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(184, '47', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

//Fin Receta


}); 