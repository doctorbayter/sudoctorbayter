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
    'name' => 'Deditos de queso con tocino',
    'slug' => 'deditos-de-queso-con-tocino',
    'indice'=> 1,
    'carbs' => 0,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/deditos-de-queso-con-tocino.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '20 gramos de queso doble crema o el que tengas en tu casa ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 huevo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 (25 gramos) lonjas o lonchas o tiras de tocino o panceta bien delgadita o bacon',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Cortar el queso en palito, similar al tamaño de un dedo',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Dejas el queso mínimo 1 hora en el congelador',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un tazón batir el huevo',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Envuelves el dedo de queso en la loncha de tocino',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Y pasas el dedo envuelto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Por el tazón con el huevo, lo cubres muy bien',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén caliente con un poco de mantequilla',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pones el dedito y le rocías el huevo que quedó en el tazón',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Das vueltas por lado y lado al dedito de queso hasta que dore',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(175, '45', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

//DIA 5

$recipe = Recipe::create([
    'name' => 'Alitas verdosas',
    'slug' => 'alitas-verdosas',
    'indice'=> 1,
    'carbs' => 19.88,
    'time' => 30,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/alitas-verdosas.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '3 alas de pollo grandes para mujer o 4 alas de pollo para hombre ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1(4 gramos) dientes de ajo finamente picado (0,98 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharadita de tomillo seco en polvo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharadita de perejil fresco finamente picado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra virgen',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 taza de caldo de pollo natural',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '100 gramos de aguacate (8,5 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '20 gramos de cebolla finamente picada (1,86 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharadita de cilantro finamente picado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 (30 ml) de zumo de limón (2 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra virgen',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Gotas de ají o chili (opcional)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'salpimienta',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Ingredientes para la ensalada',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '7 a 10 aceitunas partidas a la mitad (1 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '35 gramos de pepino picados a la juliana (1,26 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '30 gramos de apio en rama picado en cuadritos (0,93 gr. CH) ',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de col rizado (2,1 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de lechuga morada o crespa (1,16 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '30 gramos de rábano picado a la juliana (1.02 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra-virgen aromatizado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharada de vinagre balsámico',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Sal pimienta',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Preparación alitas verdosas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Antes de hacer las alitas debes preparar la salsa verde',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pon en una licuadora el aguacate, cebolla, cilantro, limón, aceite y las gotas de ají y licuas muy bien',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Si notas que esté espeso le puedes agregar un poquito de agua',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sal pimentas, revuelves nuevamente y conservar hasta que estén las alitas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un tazón pones una buena cantidad de aceite de oliva, el ajo, tomillo y perejil',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pones las alitas sal pimentas, revuelves para que se penetre todo y dejas marinando por lo menos 1 hora',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pasado este tiempo pones en un sartén un poco de mantequilla y pones las alas a fuego bajo',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregamos el caldo y dejas cocinar por 45 minutos o hasta que las alitas estén cocidas y ya este totalmente reducido el caldo',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregamos la salsa verde sobre las alitas y dejamos calentar por 5 minutos para servir todo bien caliente.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Preparación ensalada',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pones en un tazón todos los ingredientes, salpimientas y revuelves muy bien',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregas vinagre, aceite de oliva, sal pimienta y revuelves una vez más',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Sirves con tus alitas verdosas',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(176, '45', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

// DIA 6

$recipe = Recipe::create([
    'name' => 'Rollitos de especies',
    'slug' => 'rollitos-de-especies',
    'indice'=> 1,
    'carbs' => 0,
    'time' => 10,
    'type' => 1,
]);
$image = Image::create([
    'url' => 'recipes/rollitos-de-especies.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '30 gramos (3 cucharadas) de queso parmesano, para hacer el rollito',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '50 gramos de pollo desmechado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharada de mayonesa casera',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Especies de tu gusto',
    'recipe_id' => $recipe->id
]);


$x = 0;
Instruction::create([
    'name' => 'Antes de hacer el rollito revolvemos el pollo con la mayonesa y dejamos conservando.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'En un sartén pequeño colocas el queso bien esparcido a fuego bajo y se espolvorea con especies.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Cuando esté burbujeando lo volteas.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Dejas por 1 minuto le agregas el pollo y se empiezan a enrollar con cuidado para que no se deshaga.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Lo dejas un minuto más en la sartén.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Retiras y dejas endurecer antes de servir.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(177, '45', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");


}); 