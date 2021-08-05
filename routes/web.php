<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\UserRecipe;
use App\Models\Day;
use App\Models\Fase;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Plan;
use App\Models\Recipe;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Week;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;

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
Route::get('/metodo-dkp/47', [HomeController::class, 'dkpOferta'])->name('dkp.oferta');
Route::get('/metodo-dkp/tiktok', [HomeController::class, 'dkpTiktok'])->name('dkp.dkpTiktok');
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

Route::get('x/sql/', function(){

    $plan_8 = Subscription::where('plan_id','=','8')->get();
    $plan_9 = Subscription::where('plan_id','=','9')->get();
    echo $plan_8->count(). " Plan Fase 1 47 us";
    echo "<br>";
    echo $plan_9->count(). " Plan 4 Fases 99 us";

});


Route::get('x/recipes/', function(){

    $recipes = Recipe::all();

    print_r($recipes);

});

Route::get('x/api/', function(){

    $days = Day::all();

    echo $days;

});




Route::get('x/plan/{user}', function($user){

    $user = User::where('email',$user)->first();

    if($user){
        return array($user->subscriptions);
    }else{
        return "Usuario no registrado";
    }

    $plan_8 = Subscription::where('plan_id','=','8')->get();
    $plan_9 = Subscription::where('plan_id','=','9')->get();
    echo $plan_8->count(). " Plan Fase 1 47 us";
    echo "<br>";
    echo $plan_9->count(). " Plan 4 Fases 99 us";

});





Route::get('x/query', function(){

    /*
    $users = User::where('email','!=','null')->skip(3500)->take(1000)->get();
    $fase = Fase::find(3);

    foreach($users as $user){

        if ($user->subscription) {
            if ($user->subscription->plan->id == 1 ) {

                if ($fase->clients->contains($user->id)) {
                    //Do Nohing
                }else{
                    $fase->clients()->attach($user->id);
                }
            }
        }
    }

    echo "Do it";*/

    //$row = DB::table('day_recipe')->where('id', '=', '36')->update(['meal' => 1]);
    //DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (4, '3', '1', CURRENT_TIMESTAMP, NULL)");

 /*
    Day::create([
        'day' => 1,
        'fase_id' => 4,
    ]);
    Day::create([
        'day' => 2,
        'fase_id' => 4,
    ]);
    Day::create([
        'day' => 3,
        'fase_id' => 4,

    ]);
    Day::create([
        'day' => 4,
        'fase_id' => 4,
    ]);
    Day::create([
        'day' => 5,
        'fase_id' => 4,

    ]);
    Day::create([
        'day' => 6,
        'fase_id' => 4,
    ]);
    Day::create([
        'day' => 7,
        'fase_id' => 4,
    ]);
    */

    /*
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (64, '4', '92', CURRENT_TIMESTAMP, NULL),
    (65, '4', '93', CURRENT_TIMESTAMP, NULL),
    (66, '4', '94', CURRENT_TIMESTAMP, NULL),
    (67, '4', '95', CURRENT_TIMESTAMP, NULL),
    (68, '4', '96', CURRENT_TIMESTAMP, NULL),
    (69, '4', '97', CURRENT_TIMESTAMP, NULL),
    (70, '4', '98', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (64, '92', '1', CURRENT_TIMESTAMP, NULL),
    (65, '93', '1', CURRENT_TIMESTAMP, NULL),
    (66, '94', '1', CURRENT_TIMESTAMP, NULL),
    (67, '95', '1', CURRENT_TIMESTAMP, NULL),
    (68, '96', '1', CURRENT_TIMESTAMP, NULL),
    (69, '97', '1', CURRENT_TIMESTAMP, NULL),
    (70, '98', '1', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    (10, '4', '1', 'files/pdf/lista-de-alimentos-fase-4-1-dkp.pdf', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    (6, 'Lista de Alimentos Fase 3', 'files/pdf/lista-de-alimentos-fase-3-dkp.pdf', '3', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL),
    (7, 'Secretos Fase 3', 'files/pdf/secretos-fase-3-dkp.pdf', '3', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");

    */



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Tortilla',
        'slug' => 'tortilla',
        'indice'=> 1,
        'carbs' => 0.85,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/tortilla.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '5 gramos De apio en rama (puede ser la hoja o el tallo o las dos) finamente picado (0,15 gr)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de espinacas finamente picado (0,70 gr)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos queso partido en trocitos de su gusto, pero graso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'sal pimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un sarten con mantequilla a fuego medio sofreír el apio y espinacas por unos minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Verter los huevos en el sarten',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revolver y añadir el queso y salpimentar, dejar que se forme la tortilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (248, '97', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Salpicón Bayter',
        'slug' => 'salpicon-bayter',
        'indice'=> 1,
        'carbs' => 3.65,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/salpicon-bayter.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1 cucharada de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '180 a 200 gramos de salmón partido en trocitos y adobado a su gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos de apio en rama picado en trocitos (0,45 g. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de brócoli picado (2,2 g. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 diente de ajo (1gr.) finamente picado (1 gramo de carbohidrato)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de especies de su gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos (3cucharadas) de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Precalentar el horno a 180 grados',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una sartén grande a fuego medio-alto, dorar los trocitos de salmón con la mantequilla.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté el salmón, añadir los trocitos de apio, el brócoli, el ajo, especies salpimentar.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Continuar cocinando por no mas de 10 minutos o hasta que el apio y el brócoli estén tiernos, pero no blandos.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retirar del fuego y reservar.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una refractaria, colocar el salmón y espolvorear con el queso parmesano.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Hornear durante 10 minutos o cuando esté dorado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (249, '97', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Pizzeta de Queso',
        'slug' => 'pizzeta-de-queso',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/pizzeta-de-queso.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50gr. Queso partido o en lonjas o lonchas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de Albahaca seca o romero o laurel ( o la especie de su gusto)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Precalentar el horno a 180 grados centigrados',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Batir muy bien los huevos y salpimentar.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una bandeja que pueda llevar al horno redonda y pequena colocar el huevo y dejar por 5 minutos que se haga la tortilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sacar y agregar el queso y espolvorear con la especie y dejar unos minutos mas hasta que los bordes esten crocantes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (250, '97', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (251, '98', 243, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta

    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (250, '98', 30, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta

    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (251, '98', 27, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


});
