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
    'name' => 'Tortilla con queso',
    'slug' => 'tortilla-con-queso',
    'indice'=> 1,
    'carbs' => 1,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/tortilla-con-queso.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '2 huevos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '7 a 10 aceitunas partidas a la mitad (1 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de queso manchego o el que tengas en casa, pero graso',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharadita de Albahaca seca y orégano (o la especie al gusto)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Salpimienta',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Batir muy bien los huevos y salpimentar.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén preferiblemente redondo con un poco de mantequilla',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Colocamos los huevos y dejas por 5 minutos que se haga la tortilla',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Das vuelta a la tortilla y agregas el queso, aceitunas, espolvorear con especies y tapas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Dejas unos minutos más hasta que el queso derrita',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(178, '46', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

//Fin Receta

$recipe = Recipe::create([
    'name' => 'Diablitos ketozuquinis',
    'slug' => 'diablitos-ketozuquinis',
    'indice'=> 1,
    'carbs' => 18.32,
    'time' => 30,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/diablitos-ketozuquinis.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '150 a 180 gramos de camarones grandes, precocidos y limpios (lo puedes cambiar por la proteína de tu gusto)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '30 gramos de cebolla roja finamente picada (2,79 gr. CH) ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1(2 gramos) diente de ajo finamente picado (0,48 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Media taza de consomé de pollo o pescado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 cucharada de pasta de tomate casera',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Media cucharadita de ají o jalapeño o salsa picante',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '250 gramos de zucchini (8,25 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '80 gramos de aguacate (6,8 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Media cucharadita de albahaca finamente picado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'salpimienta',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'En un sartén con mantequilla y a fuego bajo pones a sofreír la cebolla y ajo hasta que esté doradito',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Añades el consomé y cuando esté hirviendo y bien reducido',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Incorporamos la pasta de tomate, ají y dejas por dos minutos más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregas los camarones revuelves y cocinas por otros 5 minutos apagas y dejas tapado',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Simultáneamente en otro sartén con un poco de mantequilla y bien caliente',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pones los zucchinis salpimientas y rocías con la albahaca y revuelves dejas por 1 a 2 minutos máximo ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Una vez lista la pasta de zucchini sirves, agregas la salsa de camarones ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Espolvoreamos con el queso parmesano',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'sirves de inmediato con la porción de aguacate',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(179, '46', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

//Fin Receta


$recipe = Recipe::create([
    'name' => 'Champialbahaca con tocineta',
    'slug' => 'champialbahaca-con-tocineta',
    'indice'=> 1,
    'carbs' => 4.92,
    'time' => 15,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/champialbahaca-con-tocineta.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '60 gramos de champiñones enteros (1,98 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '60 gramos de espinacas enteras (0,84 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '20 gramos de cebolla finamente picada (1,86 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 (1 gramos) diente de ajo finamente picado (0, 24 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de tocineta o panceta picado en trozos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharadita de albahaca finamente picada',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2(20 gramos) cucharadas de queso parmesano',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'salpimienta',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'En un sartén con un poco mantequilla y a fuego bajo ponemos a sofreír el ajo y la cebolla',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'una vez doraditos agregamos los champiñones, albahaca, espinacas y los trocitos de tocino ',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Si ves que están muy secos le puedes poner un poco más de mantequilla',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Salpimientas y revuelves',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Dejas sofreír por 8 minutos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves de inmediato y espolvoreamos con el queso parmesano',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(180, '46', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

//Fin Receta

}); 