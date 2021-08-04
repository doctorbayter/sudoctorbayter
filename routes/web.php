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

    $response = Http::withHeaders([
        'Api-Token' => '278f19882caf7646e414e5a2f1c8696a24809757437b7973cabcbba6742ca309d6eca018'
    ]);

    $getUserByEmail = $response->GET('https://mediasocial.api-us1.com/api/3/contacts/',[
        "email" => "yefer.cote@hotmail.com",
        "orders[email]" => "ASC"
    ]);

    $getUserByEmail = $getUserByEmail['contacts'];

    if($getUserByEmail){
        return $getUserByEmail[0];
    }
    return  $getUserByEmail;

    /**
     *
    $addTagUser = $response->POST('https://mediasocial.api-us1.com/api/3/contactTags',[
        "contactTag" => [
            "contact" => 38,
            "tag" => 4

        ]
    ]);
    return $addTagUser;
    */

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


    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (64, '4', '64', CURRENT_TIMESTAMP, NULL),
    (65, '4', '65', CURRENT_TIMESTAMP, NULL),
    (66, '4', '66', CURRENT_TIMESTAMP, NULL),
    (67, '4', '67', CURRENT_TIMESTAMP, NULL),
    (68, '4', '68', CURRENT_TIMESTAMP, NULL),
    (69, '4', '69', CURRENT_TIMESTAMP, NULL),
    (70, '4', '70', CURRENT_TIMESTAMP, NULL)");




    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (64, '64', '1', CURRENT_TIMESTAMP, NULL),
    (65, '65', '1', CURRENT_TIMESTAMP, NULL),
    (66, '66', '1', CURRENT_TIMESTAMP, NULL),
    (67, '67', '1', CURRENT_TIMESTAMP, NULL),
    (68, '68', '1', CURRENT_TIMESTAMP, NULL),
    (69, '69', '1', CURRENT_TIMESTAMP, NULL),
    (70, '70', '1', CURRENT_TIMESTAMP, NULL);");





    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    (10, '4', '1', 'files/pdf/lista-de-alimentos-fase-4-1-dkp.pdf', CURRENT_TIMESTAMP, NULL)");

    */


    /*
    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    (6, 'Lista de Alimentos Fase 3', 'files/pdf/lista-de-alimentos-fase-3-dkp.pdf', '3', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL),
    (7, 'Secretos Fase 3', 'files/pdf/secretos-fase-3-dkp.pdf', '3', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");
    */

    /* Id de receta actual
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (232, '63', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    */




    /*

    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Tortilla de espinacas',
        'slug' => 'tortilla-de-espinacas',
        'indice'=> 1,
        'carbs' => 0.7,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/tortilla-de-espinacas.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gr. De queso partido en trocitos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50gr. De espinacas finamente picada (0,70 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Café o te o agua',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón con mantequilla se parten los dos huevos y se baten con sal',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se deja que se medio cocine, y abierto se le agregan las espinacas, el queso y se dobla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se deja freír hasta que se derrita el queso y el huevo a su gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (233, '64', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta




    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Salmón a la Plancha',
        'slug' => 'salmon-a-la-plancha',
        'indice'=> 1,
        'carbs' => 16,01,
        'time' => 25,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/salmon-a-la-plancha.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '180 a 200 gramos de salmón adobados a su gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '120 gramos de aguacate a la juliana (10,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de brócoli en trozos (2,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de pepino a la juliana (2,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '7 a 10 aceitunas partidas a la mitad (1 gramo de carbohidratos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15gramos de apio en rama en trocitos (0,45 gr. CH)',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En una licuadora se colocan 3 cucharadas de aceite de olivas extra virgen, 1 cucharada de perejil, 2 cucharadas de vinagre, sal y pimienta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'cuando este todo incorporado se baña los vegetales del tazón.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (234, '64', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Huevitos',
        'slug' => 'huevitos',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/huevitos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos cocidos partidos a la mitad',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20gramos) de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de aceite de oliva',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Se parten los huevos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se espolorea el queso parmesano',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sal pimienta y se bana con el aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (235, '64', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Huevitos friticos',
        'slug' => 'huevitos-friticos',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/huevitos-friticos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '3 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '70 gramos de queso tipo manchego o de su gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Café o te o agua',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Se fritan los tres huevos en un sarten con mantequilla a su gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si desea el queso lo aza o lo pone encima de los huevos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se sirve de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (236, '65', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Alitas al gusto',
        'slug' => 'alitas-al-gusto',
        'indice'=> 1,
        'carbs' => 16.71,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/alitas-al-gusto.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '4 alitas guisadas o doradas a su gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de espinacas finamente picada (0,70 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de brócoli (2,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de pepino a la juliana (2,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '7 a 10 aceitunas partidas a la mitad (1gramo de carbohidrato)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos de apio en rama en trocitos (0,45 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '120 gramos de aguacate (10,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de cilantro',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 chorrito de agua',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharadas de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de vinagre de cidra de manzana',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la licuadora se coloca el aguacate, cilantro, agua, aceite de oliva extra virgen, vinagre, sal y pimienta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando este todo incorporado se deja reposar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón se pone el resto de los ingredientes y se bañan los vegetales con la salsa que tenemos en reposo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (237, '65', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (238, '65', 57, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Huevos con brócoli',
        'slug' => 'huevos-con-brocoli',
        'indice'=> 1,
        'carbs' => 2.2,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/huevos-con-brocoli.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '50gramos de brócoli (2,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de queso (el de su gusto pero que sea graso)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Al gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (239, '66', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (240, '66', 30, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Huevitos revueltos',
        'slug' => 'huevitos-revueltos',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/huevitos-revueltos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50gr. de queso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '7 aceitunas',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Se hacen los huevos revueltos a su gusto, con aceitunas y queso',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si desea puede dejar el queso y aceitunas aparte',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (241, '66', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Duritos rellenos',
        'slug' => 'duritos-rellenos',
        'indice'=> 1,
        'carbs' => 5.1,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/duritos-rellenos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos duros partidos en la mitad',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de aguacate (5,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos (3 cucharadas) queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Retiramos a los huevos las yemas con cuidado y dejamos solo las claras',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón se coloca el aguacate y se machaca con 2 cucharadas de aceite de oliva y se le agregan las yemas y salpimienta y seguimos machacando y se deja conservar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se rellena las claras con la pasta del tazón y se espolvorea con el queso y perejil',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir se baña con un poco mas de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (242, '67', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (243, '67', 15, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (244, '67', 27, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Montadito de galletas con mantequilla',
        'slug' => 'montadito-de-galletas-con-mantequilla',
        'indice'=> 1,
        'carbs' => 1.7,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/montadito-de-galletas-con-mantequilla.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '50 gramos (5 cucharadas) de queso parmesano (para hacer dos galletas de queso parmesano recuerde que por cada galleta son dos cucharas y media)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos cocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de aguacate machacado (1,7 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En una cacerola( pequena) a fuego bajo se colocan las dos cucharadas y media grandes',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Esparcidas y se deja freir el queso hasta que dore y quede duro.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se repite lo mismo para hacer la otra galleta.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazon se machacha los huevos, la mantequilla y el aguacate y se sal pimienta al gusto.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En cada galleta se hace un montadito de la mantequilla de huevo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (245, '68', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta

*/

    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Rabadillas ketopedorras',
        'slug' => 'rabadillas-ketopedorras',
        'indice'=> 1,
        'carbs' => 11.61,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/rabadillas-ketopedorras.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '60 gramos de aguacate a la juliana (5,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de pepino a la juliana (2,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de espinacas enteras (0,70 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '7 a 10 aceitunas partidas a la mitad (1 gramo de carbohidratos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos apio en rama en trocitos (0,45 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de brócoli (2,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40gr. De queso partido en trocito',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharadas de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de vinagre de cidra de manzana',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de tomillo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/2 cucharadita de romero fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/2 cucharadita de orégano fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);



    $x = 0;
    Instruction::create([
        'name' => 'En una licuadora se coloca las 3 cuchardas de aceite de oliva, 4 aceitunas negras, 4 aceitunas verdes ( si no tiene negras todas verdes)',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    Instruction::create([
        'name' => '1 ajo pequeño de 1 gr., la mitad de una cucharadita de oregano y romero fresco y una cucharada de zumo de limon que es igual a 15 ml o 30 gr.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sal y pimienta al gusto.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando este todo incorporado se baña los vegetales.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (246, '68', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta

});
