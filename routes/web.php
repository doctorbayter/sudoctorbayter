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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    
    $fase = Fase::find(3);
    foreach ($fase->weeks as $key => $week){
        dd($week->pivot->resource);
        //dd($week);
    }
 
});

Route::get('x/query', function(){


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

    DB::insert("ALTER TABLE day_recipe CHANGE meal meal ENUM('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");

    echo "fin";

/*
    $recipe = Recipe::create([
        'name' => 'Huevos cocidos',
        'slug' => 'huevos-cocidos',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 7,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/huevos-cocidos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos cocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2(20 gramos) queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de aceite de oliva aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Haces los huevos en agua hirviendo y los dejas de 10 a 15 minutos según tu gusto',
        'step' =>  $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Divides los huevos, le agregamos encima el queso parmesano',
        'step' =>  $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sal Pimienta al gusto y añades aceite de oliva',
        'step' =>  $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (169, '43', $recipe->id, '5', CURRENT_TIMESTAMP, NULL)");
*/

/*

    $recipe = Recipe::create([
        'name' => 'Robalo con mariscos',
        'slug' => 'robalo-con-mariscos',
        'indice'=> 1,
        'carbs' => 15.32,
        'time' => 25,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/robalo-con-mariscos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Filete de robalo 160 a 180 gramos para mujer y de 200 a 250 gramos para hombres, previamente sazonado al gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de camarones limpios y precocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de anillos de calamar precocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de tomate picado en cuadritos (1,56 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo finamente picado (0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 (30 gramos) cucharadas de queso crema',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 (30 gramo cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes ensalada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de espinacas limpias y enteras (0,84 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de rúcula entera (2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de champiñones picados en láminas (1,98 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de pepino en láminas (2,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 ml (2 cucharadas) de zumo de limón (2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de aguacate picada a la juliana (8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo cocido picado en trozos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);
    
    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con un poco de mantequilla y a fuego alto, sellar el filete por lado y lado y dejas a parte en una refractaria previa con mantequilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En este mismo sartén y con un poco más de mantequilla agregamos el tomate y el ajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas que se so frite por unos minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y añades el queso crema, salpimientas revuelves y dejas por 1 minutos más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas los camarones, anillos y dejas por unos minutos más a fuego bajo y apagas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En la refractaria donde tienes el robalo, lo bañas con la salsa del sartén',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas el queso parmesano y llevamos al horno por 10 minutos o hasta que gratine',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves con la rica ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones en un tazón las espinacas, rúcula, champiñones, pepinos revuelves y salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregamos el zumo de limón, mayonesa un chorrito de aceite y revuelves una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregar al aguacate, espolvoreamos con el huevo y sal pimentas ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir con el robalo bañas con un poco más de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (170, '43', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

*/

/*
    $recipe = Recipe::create([
        'name' => 'Champialbahaca',
        'slug' => 'champialbahaca',
        'indice'=> 1,
        'carbs' => 5.58,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/champialbahaca.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '80 gramos de champiñones enteros (2,64 gr. CH)',
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
        'name' => ' 1 (1 gramos) diente de ajo finamente picado (0, 24 gr. CH)',
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
        'name' => 'En un sartén con un poco mantequilla y a fuego bajo pones a sofreír el ajo y la cebolla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez doraditos agregamos los champiñones, albahaca y espinacas',
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
        'name' => 'Dejamos sofreír por 8 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servimos de inmediato y espolvoreamos con el queso parmesano',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (171, '43', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

*/

//HASTA AQUI


    //DB::insert("UPDATE fase_week SET resource = 'files/pdf/lista-de-alimentos-fase-2-1-dkp.pdf' WHERE fase_week.id = 4");
    

    /* DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at)VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', CURRENT_TIMESTAMP, NULL), (4, '1', '4', CURRENT_TIMESTAMP, NULL), (5, '1', '5', CURRENT_TIMESTAMP, NULL), (6, '1', '6', CURRENT_TIMESTAMP, NULL), (7, '1', '7', CURRENT_TIMESTAMP, NULL), (8, '1', '8', CURRENT_TIMESTAMP, NULL), (9, '1', '9', CURRENT_TIMESTAMP, NULL), (10, '1', '10', CURRENT_TIMESTAMP, NULL), (11, '1', '11', CURRENT_TIMESTAMP, NULL), (12, '1', '12', CURRENT_TIMESTAMP, NULL), (13, '1', '13', CURRENT_TIMESTAMP, NULL), (14, '1', '14', CURRENT_TIMESTAMP, NULL), (15, '1', '15', CURRENT_TIMESTAMP, NULL), (16, '1', '16', CURRENT_TIMESTAMP, NULL), (17, '1', '17', CURRENT_TIMESTAMP, NULL), (18, '1', '18', CURRENT_TIMESTAMP, NULL), (19, '1', '19', CURRENT_TIMESTAMP, NULL), (20, '1', '20', CURRENT_TIMESTAMP, NULL), (21, '1', '21', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '2', '1', CURRENT_TIMESTAMP, NULL), (3, '3', '1', CURRENT_TIMESTAMP, NULL), (4, '4', '1', CURRENT_TIMESTAMP, NULL), (5, '5', '1', CURRENT_TIMESTAMP, NULL), (6, '6', '1', CURRENT_TIMESTAMP, NULL), (7, '7', '1', CURRENT_TIMESTAMP, NULL), (8, '8', '2', CURRENT_TIMESTAMP, NULL), (9, '9', '2', CURRENT_TIMESTAMP, NULL), (10, '10', '2', CURRENT_TIMESTAMP, NULL), (11, '11', '2', CURRENT_TIMESTAMP, NULL), (12, '12', '2', CURRENT_TIMESTAMP, NULL), (13, '13', '2', CURRENT_TIMESTAMP, NULL), (14, '14', '2', CURRENT_TIMESTAMP, NULL), (15, '15', '3', CURRENT_TIMESTAMP, NULL), (16, '16', '3', CURRENT_TIMESTAMP, NULL), (17, '17', '3', CURRENT_TIMESTAMP, NULL), (18, '18', '3', CURRENT_TIMESTAMP, NULL), (19, '19', '3', CURRENT_TIMESTAMP, NULL), (20, '20', '3', CURRENT_TIMESTAMP, NULL), (21, '21', '3', CURRENT_TIMESTAMP, NULL);
    ");

    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) 
    VALUES (22, '2', '22', CURRENT_TIMESTAMP, NULL), (23, '2', '23', CURRENT_TIMESTAMP, NULL),
    (24, '2', '24', CURRENT_TIMESTAMP, NULL),
    (25, '2', '25', CURRENT_TIMESTAMP, NULL),
    (26, '2', '26', CURRENT_TIMESTAMP, NULL), 
    (27, '2', '27', CURRENT_TIMESTAMP, NULL),
    (28, '2', '28', CURRENT_TIMESTAMP, NULL),
    (29, '2', '29', CURRENT_TIMESTAMP, NULL),
    (30, '2', '30', CURRENT_TIMESTAMP, NULL),
    (31, '2', '31', CURRENT_TIMESTAMP, NULL),
    (32, '2', '32', CURRENT_TIMESTAMP, NULL),
    (33, '2', '33', CURRENT_TIMESTAMP, NULL),
    (34, '2', '34', CURRENT_TIMESTAMP, NULL),
    (35, '2', '35', CURRENT_TIMESTAMP, NULL),
    (36, '2', '36', CURRENT_TIMESTAMP, NULL),
    (37, '2', '37', CURRENT_TIMESTAMP, NULL),
    (38, '2', '38', CURRENT_TIMESTAMP, NULL),
    (39, '2', '39', CURRENT_TIMESTAMP, NULL),
    (40, '2', '40', CURRENT_TIMESTAMP, NULL),
    (41, '2', '41', CURRENT_TIMESTAMP, NULL),
    (42, '2', '42', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at)
    VALUES (22, '22', '1', CURRENT_TIMESTAMP, NULL),
    (23, '23', '1', CURRENT_TIMESTAMP, NULL),
    (24, '24', '1', CURRENT_TIMESTAMP, NULL),
    (25, '25', '1', CURRENT_TIMESTAMP, NULL),
    (26, '26', '1', CURRENT_TIMESTAMP, NULL),
    (27, '27', '1', CURRENT_TIMESTAMP, NULL),
    (28, '28', '1', CURRENT_TIMESTAMP, NULL),
    (29, '29', '2', CURRENT_TIMESTAMP, NULL),
    (30, '30', '2', CURRENT_TIMESTAMP, NULL),
    (31, '31', '2', CURRENT_TIMESTAMP, NULL),
    (32, '32', '2', CURRENT_TIMESTAMP, NULL),
    (33, '33', '2', CURRENT_TIMESTAMP, NULL),
    (34, '34', '2', CURRENT_TIMESTAMP, NULL),
    (35, '35', '2', CURRENT_TIMESTAMP, NULL),
    (36, '36', '3', CURRENT_TIMESTAMP, NULL),
    (37, '37', '3', CURRENT_TIMESTAMP, NULL),
    (38, '38', '3', CURRENT_TIMESTAMP, NULL),
    (39, '39', '3', CURRENT_TIMESTAMP, NULL),
    (40, '40', '3', CURRENT_TIMESTAMP, NULL),
    (41, '41', '3', CURRENT_TIMESTAMP, NULL),
    (42, '42', '3', CURRENT_TIMESTAMP, NULL);
    ");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at)
    VALUES (1, '1', '2', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at)
    VALUES (2, '1', '1', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at)
    VALUES (3, '2', '1', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, created_at, updated_at) 
    VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL),
    (2, '1', '2', CURRENT_TIMESTAMP, NULL),
    (3, '1', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, created_at, updated_at)
    VALUES (4, '2', '1', CURRENT_TIMESTAMP, NULL),
    (5, '2', '2', CURRENT_TIMESTAMP, NULL),
    (6, '2', '3', CURRENT_TIMESTAMP, NULL)");
    
    
    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES (1, 'Lista de Alimentos Fase 1', 'files/pdf/lista-de-alimentos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL), (2, 'Secretos Fase 1', 'files/pdf/secretos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES (3, 'Lista de Alimentos Fase 2', 'files/pdf/lista-de-alimentos-fase-2-dkp.pdf', '2', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL), (4, 'Secretos Fase 2', 'files/pdf/secretos-fase-2-dkp.pdf', '2', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (32, '2', '1', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (2, '1', '2', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (2, '1', '2', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (33, '2', '2', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (3, '1', '3', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (3, '1', '3', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (34, '2', '3', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (4, '1', '4', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (4, '1', '4', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (35, '2', '4', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (5, '1', '5', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (5, '1', '5', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (36, '2', '5', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (6, '1', '6', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (6, '1', '6', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (37, '2', '6', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (7, '1', '7', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (7, '1', '7', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (38, '2', '7', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (8, '1', '8', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (8, '1', '8', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (39, '2', '8', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (9, '1', '9', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (9, '1', '9', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (40, '2', '9', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (10, '1', '10', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (10, '1', '10', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (42, '2', '10', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (11, '1', '11', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (11, '1', '11', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (43, '2', '11', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (12, '1', '12', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (12, '1', '12', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (44, '2', '12', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (13, '1', '13', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (13, '1', '13', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (45, '2', '13', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (14, '1', '14', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (14, '1', '14', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (46, '2', '14', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (15, '1', '15', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (15, '1', '15', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (47, '2', '15', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (16, '1', '16', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (16, '1', '16', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (48, '2', '16', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (17, '1', '17', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (17, '1', '17', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (49, '2', '17', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (18, '1', '18', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (18, '1', '18', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (50, '1', '18', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (19, '1', '19', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (19, '1', '19', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (51, '2', '19', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (20, '1', '20', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (20, '1', '20', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (52, '2', '20', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (21, '1', '21', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (21, '1', '21', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (53, '2', '21', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (22, '1', '22', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (22, '1', '22', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (54, '2', '22', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (23, '1', '23', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (23, '1', '23', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (55, '2', '23', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (24, '1', '24', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (24, '1', '24', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (56, '2', '24', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (25, '1', '25', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (25, '1', '25', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (57, '2', '25', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (26, '1', '26', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (26, '1', '26', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (58, '2', '26', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (27, '1', '27', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (27, '1', '27', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (59, '2', '27', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (28, '1', '28', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (28, '1', '28', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (60, '2', '28', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (29, '1', '29', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (29, '1', '29', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (61, '2', '29', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (30, '1', '30', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (30, '1', '30', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (62, '2', '30', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (31, '1', '31', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (31, '1', '31', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (63, '2', '31', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (32, '1', '32', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (64, '1', '32', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (65, '2', '32', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (33, '1', '33', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (66, '1', '33', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (67, '2', '33', CURRENT_TIMESTAMP, NULL)");



    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '1', '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', '3', CURRENT_TIMESTAMP, NULL), (4, '1', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '1', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (6, '2', '6', '1', CURRENT_TIMESTAMP, NULL), (7, '2', '7', '2', CURRENT_TIMESTAMP, NULL), (8, '2', '8', '3', CURRENT_TIMESTAMP, NULL), (9, '2', '5', '4', CURRENT_TIMESTAMP, NULL), (10, '2', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (11, '3', '10', '1', CURRENT_TIMESTAMP, NULL),(12, '3', '11', '2', CURRENT_TIMESTAMP, NULL), (13, '3', '12', '3', CURRENT_TIMESTAMP, NULL), (14, '3', '13', '4', CURRENT_TIMESTAMP, NULL), (15, '3', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (16, '4', '14', '1', CURRENT_TIMESTAMP, NULL), (17, '4', '15', '2', CURRENT_TIMESTAMP, NULL), (18, '4', '16', '3', CURRENT_TIMESTAMP, NULL), (19, '4', '17', '4', CURRENT_TIMESTAMP, NULL), (20, '4', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (21, '5', '18', '1', CURRENT_TIMESTAMP, NULL), (22, '5', '19', '2', CURRENT_TIMESTAMP, NULL), (23, '5', '20', '3', CURRENT_TIMESTAMP, NULL), (24, '5', '21', '4', CURRENT_TIMESTAMP, NULL), (25, '5', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (26, '6', '22', '1', CURRENT_TIMESTAMP, NULL), (27, '6', '23', '2', CURRENT_TIMESTAMP, NULL), (28, '6', '24', '3', CURRENT_TIMESTAMP, NULL), (29, '6', '5', '4', CURRENT_TIMESTAMP, NULL), (30, '6', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (31, '7', '25', '1', CURRENT_TIMESTAMP, NULL), (32, '7', '26', '2', CURRENT_TIMESTAMP, NULL), (33, '7', '27', '3', CURRENT_TIMESTAMP, NULL), (34, '7', '4', '4', CURRENT_TIMESTAMP, NULL), (35, '7', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (36, '8', '29', '2', CURRENT_TIMESTAMP, NULL), (37, '8', '30', '3', CURRENT_TIMESTAMP, NULL), (38, '8', '31', '4', CURRENT_TIMESTAMP, NULL), (39, '8', '32', '4', CURRENT_TIMESTAMP, NULL), (40, '8', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (41, '9', '33', '1', CURRENT_TIMESTAMP, NULL), (42, '9', '34', '2', CURRENT_TIMESTAMP, NULL), (43, '9', '35', '3', CURRENT_TIMESTAMP, NULL), (44, '9', '4', '4', CURRENT_TIMESTAMP, NULL), (45, '9', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (46, '10', '36', '1', CURRENT_TIMESTAMP, NULL), (47, '10', '37', '2', CURRENT_TIMESTAMP, NULL), (48, '10', '38', '3', CURRENT_TIMESTAMP, NULL), (49, '10', '5', '4', CURRENT_TIMESTAMP, NULL), (50, '10', '39', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (51, '11', '40', '1', CURRENT_TIMESTAMP, NULL), (52, '11', '41', '2', CURRENT_TIMESTAMP, NULL), (53, '11', '42', '3', CURRENT_TIMESTAMP, NULL), (54, '11', '43', '4', CURRENT_TIMESTAMP, NULL), (55, '11', '44', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (56, '12', '45', '1', CURRENT_TIMESTAMP, NULL), (57, '12', '46', '2', CURRENT_TIMESTAMP, NULL), (58, '12', '47', '3', CURRENT_TIMESTAMP, NULL), (59, '12', '4', '4', CURRENT_TIMESTAMP, NULL), (60, '12', '32', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (61, '13', '1', '1', CURRENT_TIMESTAMP, NULL), (62, '13', '48', '2', CURRENT_TIMESTAMP, NULL), (63, '13', '49', '3', CURRENT_TIMESTAMP, NULL), (64, '13', '50', '4', CURRENT_TIMESTAMP, NULL), (65, '13', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (66, '14', '51', '1', CURRENT_TIMESTAMP, NULL), (67, '14', '52', '2', CURRENT_TIMESTAMP, NULL), (68, '14', '53', '3', CURRENT_TIMESTAMP, NULL), (69, '14', '54', '4', CURRENT_TIMESTAMP, NULL),(70, '14', '43', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (71, '15', '55', '1', CURRENT_TIMESTAMP, NULL), (72, '15', '56', '2', CURRENT_TIMESTAMP, NULL), (73, '15', '57', '3', CURRENT_TIMESTAMP, NULL), (74, '15', '58', '4', CURRENT_TIMESTAMP, NULL), (75, '15', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (76, '16', '59', '1', CURRENT_TIMESTAMP, NULL), (77, '16', '60', '2', CURRENT_TIMESTAMP, NULL), (78, '16', '61', '2', CURRENT_TIMESTAMP, NULL), (79, '16', '5', '4', CURRENT_TIMESTAMP, NULL), (80, '16', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (81, '17', '62', '1', CURRENT_TIMESTAMP, NULL), (82, '17', '63', '2', CURRENT_TIMESTAMP, NULL), (83, '17', '64', '3', CURRENT_TIMESTAMP, NULL), (84, '17', '4', '4', CURRENT_TIMESTAMP, NULL), (85, '17', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (86, '18', '65', '1', CURRENT_TIMESTAMP, NULL), (87, '18', '66', '2', CURRENT_TIMESTAMP, NULL), (88, '18', '67', '3', CURRENT_TIMESTAMP, NULL), (89, '18', '4', '4', CURRENT_TIMESTAMP, NULL), (90, '18', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (91, '19', '68', '1', CURRENT_TIMESTAMP, NULL), (92, '19', '69', '2', CURRENT_TIMESTAMP, NULL), (93, '19', '16', '3', CURRENT_TIMESTAMP, NULL), (94, '19', '44', '4', CURRENT_TIMESTAMP, NULL), (95, '19', '43', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (96, '20', '70', '1', CURRENT_TIMESTAMP, NULL), (97, '20', '71', '2', CURRENT_TIMESTAMP, NULL), (98, '20', '72', '3', CURRENT_TIMESTAMP, NULL), (99, '20', '4', '4', CURRENT_TIMESTAMP, NULL), (100, '20', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (101, '21', '45', '1', CURRENT_TIMESTAMP, NULL), (102, '21', '73', '2', CURRENT_TIMESTAMP, NULL), (103, '21', '74', '3', CURRENT_TIMESTAMP, NULL),  (104, '21', '4', '4', CURRENT_TIMESTAMP, NULL),  (105, '21', '28', '4', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (106, '22', '96', '1', CURRENT_TIMESTAMP, NULL), (107, '22', '97', '2', CURRENT_TIMESTAMP, NULL), (108, '22', '98', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (109, '23', '99', '1', CURRENT_TIMESTAMP, NULL), (110, '23', '100', '2', CURRENT_TIMESTAMP, NULL), (111, '23', '101', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (112, '24', '102', '1', CURRENT_TIMESTAMP, NULL), (113, '24', '103', '2', CURRENT_TIMESTAMP, NULL), (114, '24', '104', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (115, '25', '105', '1', CURRENT_TIMESTAMP, NULL), (116, '25', '106', '2', CURRENT_TIMESTAMP, NULL), (117, '25', '107', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (118, '26', '108', '1', CURRENT_TIMESTAMP, NULL), (119, '26', '109', '2', CURRENT_TIMESTAMP, NULL), (120, '26', '110', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (121, '27', '111', '1', CURRENT_TIMESTAMP, NULL),
    (122, '27', '112', '2', CURRENT_TIMESTAMP, NULL),
    (123, '27', '113', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (124, '28', '114', '1', CURRENT_TIMESTAMP, NULL),
    (125, '28', '115', '2', CURRENT_TIMESTAMP, NULL),
    (126, '28', '116', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (127, '29', '117', '1', CURRENT_TIMESTAMP, NULL),
    (128, '29', '118', '2', CURRENT_TIMESTAMP, NULL),
    (129, '29', '119', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (130, '30', '120', '1', CURRENT_TIMESTAMP, NULL),
    (131, '30', '121', '2', CURRENT_TIMESTAMP, NULL),
    (132, '30', '122', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (133, '31', '123', '1', CURRENT_TIMESTAMP, NULL),
    (134, '31', '124', '2', CURRENT_TIMESTAMP, NULL),
    (135, '31', '125', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (136, '32', '126', '1', CURRENT_TIMESTAMP, NULL),
    (137, '32', '127', '2', CURRENT_TIMESTAMP, NULL),
    (138, '32', '128', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (139, '33', '129', '1', CURRENT_TIMESTAMP, NULL),
    (140, '33', '130', '2', CURRENT_TIMESTAMP, NULL),
    (141, '33', '131', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (142, '34', '132', '1', CURRENT_TIMESTAMP, NULL),
    (143, '34', '133', '2', CURRENT_TIMESTAMP, NULL),
    (144, '34', '134', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (145, '35', '10', '1', CURRENT_TIMESTAMP, NULL),
    (146, '35', '135', '2', CURRENT_TIMESTAMP, NULL),
    (147, '35', '27', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (148, '36', '136', '1', CURRENT_TIMESTAMP, NULL),
    (149, '36', '137', '2', CURRENT_TIMESTAMP, NULL),
    (150, '36', '138', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (151, '37', '139', '1', CURRENT_TIMESTAMP, NULL),
    (152, '37', '140', '2', CURRENT_TIMESTAMP, NULL),
    (153, '37', '24', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (154, '38', '141', '1', CURRENT_TIMESTAMP, NULL),
    (155, '38', '142', '2', CURRENT_TIMESTAMP, NULL),
    (156, '38', '143', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (157, '39', '144', '1', CURRENT_TIMESTAMP, NULL),
    (158, '39', '145', '2', CURRENT_TIMESTAMP, NULL),
    (159, '39', '146', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (160, '40', '147', '1', CURRENT_TIMESTAMP, NULL),
    (161, '40', '148', '2', CURRENT_TIMESTAMP, NULL),
    (162, '40', '16', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (163, '41', '149', '1', CURRENT_TIMESTAMP, NULL),
    (164, '41', '150', '2', CURRENT_TIMESTAMP, NULL),
    (165, '41', '151', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (166, '42', '152', '1', CURRENT_TIMESTAMP, NULL),
    (167, '42', '153', '2', CURRENT_TIMESTAMP, NULL),
    (168, '42', '47', '3', CURRENT_TIMESTAMP, NULL)
    ");
    */
}); 