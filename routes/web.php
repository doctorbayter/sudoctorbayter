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

    /* Id de receta actual
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (211, '56', 27, '3', CURRENT_TIMESTAMP, NULL)");
    */



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Quesillo en el asador',
        'slug' => 'quesillo-en-el-asador',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/quesillo-en-el-asador.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '45 gramos de queso asadero o el que tengas en casa que se pueda poner a sofreír y no se deshaga por completo',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Pones en la porción de queso en un sartén sin ningún complemento',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Lo dejas que se dore por lado y lado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato con un buen café',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (212, '57', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Encebolladisimo en arroz de coliflor',
        'slug' => 'encebolladisimo-en-arroz-de-coliflor',
        'indice'=> 1,
        'carbs' => 14.28,
        'time' => 25,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/encebolladisimo-en-arroz-de-coliflor.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Hígado (Mujer entre 180 a 220 gramos, hombre entre 220 a 260 gramos) sazonado a tu gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadas de cilantro fresco finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de cebolla larga finamente picada ',
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
        'name' => 'Ingredientes arroz de coliflor y algo más',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de coliflor (3,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo (0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de lechuga verde picada en trozos (2,9 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '7 a 10 aceitunas enteras (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de aguacate picado en cuadros (6,8 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas (20 gramos) de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/4 de cucharadita de cilantro',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen aromatizado ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);



    $x = 0;
    Instruction::create([
        'name' => 'Preparación hígado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén o asador con mantequilla o manteca de cerdo o aceite de coco pones a sofreír el hígado por lado y lado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Mientras que este se está sofriendo, pones en un tazón el cilantro, cebollín salpimientas y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listo el hígado le pones por encima el pique de encebollado y dejas listo para emplatar con el arroz',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación del arroz de coliflor y algo mas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiras la parte blanca del coliflor y la partes en trozos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'La llevas a un procesador o licuadora hasta que se deshaga y quede similar a las pepitas de arroz',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con un poco de mantequilla y a fuego bajo pones a sofreír el ajo por dos minutos o hasta que dore',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añades la coliflor salpimientas y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas cocinar por 10 minutos o hasta que esté doradito y apagas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Mientras en un tazón pones la lechuga, aguacate, aceitunas, salpimientas y lo bañas con aceite de oliva y el vinagre',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Espolvoreamos con el cilantro revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez todo listo pones el arroz, lo espolvoreamos con queso parmesano y encima tu porción de hígado.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato con tu ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (213, '57', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Sardinilla ketoperejilada',
        'slug' => 'sardinilla-ketoperejilada',
        'indice'=> 1,
        'carbs' => 1.48,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/sardinilla-ketoperejilada.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1 sardina fresca entre 80 a 100 gramos, debe ser completa y abierta (la puedes cambiar por trucha)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de queso que derrita',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 ml de zumo de limón (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo finamente picado ( 0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de perejil',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
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
        'name' => 'Precalentar el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un plato o bandeja ponemos la sardina abierta, le rociamos el limón, ajo, perejil y salpimentamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Bañamos con aceite de oliva, con una cantidad generosa y dejamos conservar por 15 minutos mínimo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasado este tiempo, retiras y pasas la sardina a una refractaria previamente untada con mantequilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'La sardina abierta, le pones con una cuchara perejil y ajo que seguramente quedó en el plato donde la tenías conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas el queso, un poquito de mantequilla la cierras y la bañas con lo que te quedó del plato donde la tenías conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Llevas al horno por 15 minutos o hasta que veas que ya está en el punto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (214, '57', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Caribeño',
        'slug' => 'caribeno',
        'indice'=> 1,
        'carbs' => 2.8,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/caribeno.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '60 gramos de chicharrón carnudo a panceta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de berenjena partida en dos rodajas (1,8 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15ml de zumo de limón (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Especies al gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '25 gramos de queso cabra o el que tengas en casa preferiblemente graso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(20 gramos) de jamón serrano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas crema agria ',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Primero ponemos hacer los chicharrones en un sartén onda, le rocías las especies, limón y salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas cocinar por 15 minutos o cuando ya estén crujientes (revolver constantemente para evitar que se peguen)',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguido en otro sartén con un poquito de mantequilla pones asar las rodajas de berenjenas por lado y lado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez asadas las unimos con el queso y el jamón como especie de sándwich',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listo los chicharrones, sirves con el sándwich de berenjena, chicharrones y la crema agria para untar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (215, '58', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta

    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Lomos en cama de coliguacates con ñapa',
        'slug' => 'lomos-en-cama-de-coliguacates-con-napa',
        'indice'=> 1,
        'carbs' => 15.95,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/lomos-en-cama-de-coliguacates-con-napa.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 lomos de res que sumen entre los dos para mujer entre 180 a 220 gramos y para  hombre entre  220 a 260 gramos) sazonado a tu gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 ( 3 gramos) diente de ajo finamente picado ( 0,72 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes cama coliguacates con ñapa',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de coliflor ( 2,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de aguacate ( 8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 a 10 aceitunas enteras (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de pepino picado en trocitos (2,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de apio en rama finamente picado(0,31 gr. CH) ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de tomate finamente picado (0,78 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de cilantro finamente picado ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de queso crema (20 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de queso crema (10 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de mantequilla (10 gramos) ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);



    $x = 0;
    Instruction::create([
        'name' => 'Preparación de los lomos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón ponemos los lomos salpimentamos, le añadimos el ajo y buen chorro de aceite',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revolvemos para que penetre muy bien y dejamos conservando por lo menos 15 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasados este tiempo ponemos un sartén con mantequilla o manteca o aceite de coco a fuego bajo a sofreír cada uno de los lomos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos que doren por lado y lado y su cocción según tu gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación coliguacates con ñapa',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ponemos a hervir agua con sal, una vez esté burbujeando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregamos el coliflor entero y dejamos por 10 minutos o hasta que ablande',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez blando retiramos y secamos muy bien ya que suelta mucha agua',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasas a un tazón y empiezas a manchar con un tenedor una vez esté bien desintegrado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones el aguacate y haces el mismo proceso y lo vas revolviendo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas el queso crema, queso parmesano, mantequilla, salpimientas y revuelves nuevamente y dejas conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'A parte para la ñapa en una tacita pones el pepino, tomate, apio, cilantro salpimientas y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas un chorrito de aceite de oliva, el vinagre nuevamente sal pimienta y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ya todo listo, ponemos en un plato pando una cama de coliguacate, le agregamos un chorro de aceite de oliva con aceitunas, encimita los lomitos y servimos con la ñapa',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (216, '58', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Huevo caldoso',
        'slug' => 'huevo-caldoso',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/huevo-caldoso.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1 taza de consomé de pollo o costilla',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos cocidos',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Haces un consomé de pollo o costilla tradicional y según tu gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregamos dos huevos ya cocidos dentro del caldo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (217, '58', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Sencillo',
        'slug' => 'sencillo',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 7,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/sencillo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Pones en agua hirviendo los huevos a cocinar por 12 minutos o el tiempo según tu gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (218, '59', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Atún color esperanza',
        'slug' => 'atun-color-esperanza',
        'indice'=> 1,
        'carbs' => 12.98,
        'time' => 25,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/atun-color-esperanza.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Ingredientes para el atún',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 lomos de atún fresco (si es para mujer que no sumen entre los dos más de 200 gramos y para hombre no más de 260 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(4 gramos) diente de ajo finamente picado (0,98 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 ml de zumo de limón (2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de queso cheddar',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes color esperanza (salsita encima de los huevos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de aguacate (8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (15 ml) cucharada de zumo de limón (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 aceitunas finamente picadas (0,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de albahaca fresco y finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos cocidos',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Preparación atún',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón ponemos un chorro generoso de aceite de oliva, ajo, zumo de limón, sal pimienta y revolvemos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ponemos los lomos de atún en un plato pando y los bañamos con  la mezcla del tazón dejamos conservando por 15 minutos mínimo, para que todo se penetre',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasado este tiempo ponemos el atún en un sartén a fuego bajo con un poco de mantequilla o manteca o aceite de coco, ojo muy poco porque el atún está bañado en aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cocinamos por 4 minutos cada lado o hasta que esté en el punto de tu gusto, apagas y tapas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otro sartén pones el queso cheddar para que derrita',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez en su punto el queso bañas el atún y sirves de inmediato junto con tu color esperanza ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación salsita color esperanza',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una licuadora o batidora colocar el aguacate, limón, aceitunas, albahaca, aceite de oliva, sal pimienta ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Mezclamos todos los ingredientes hasta conseguir una crema suave ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Partimos los huevos en rodajas y al servir ponemos encima la salsita y salpimentamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Por supuesto ya debe estar nuestro atún para emplatar y servir (si deseas puedes acompañar con 80 gramos de  rodajas de pepino bañadas con vinagre de cidra de manzana salpimientas)',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (219, '59', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Empanada sorpresa',
        'slug' => 'empanada-sorpresa',
        'indice'=> 1,
        'carbs' => 2.64,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/empanada-sorpresa.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '3(30 gramos) de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de espinacas (0,84 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de champiñones en láminas (1,32 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1( 2 gramos) diente de ajo finamente picado( 0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de queso crema o crema agria o mayonesa casera (10 gramos)',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Primero hacemos el relleno de la empanada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén a fuego bajo con mantequilla ponemos el ajo por unos minutos o hasta que esté doradito',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregamos las espinacas, champiñones salpimentamos y dejamos que se reduzca muy bien',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listo retiramos, ponemos en una tacita revolvemos con el queso crema o crema agria o mayonesa casera y dejamos a parte',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguido preparamos el cascarón de la empanada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén colocamos el queso parmesano a fuego bajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté burbujeando le das vuelta y dejas por unos segundos más ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiras del sartén y pones en un plato pando para que puedas poner el relleno encima',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Rápidamente cierras la masita de queso en forma de empanada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirve de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (220, '59', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Sándwich con tapitas de huevo',
        'slug' => 'sandwich-con-tapitas-de-huevo',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/sandwich-con-tapitas-de-huevo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Manteca de cerdo o mantequilla de vaca 100% de pastoreo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de mantequilla de vaca 100% de pastoreo (para untar en el sándwich)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de queso holandés o cualquier queso graso en láminas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(25 gramos) lonja o rodaja o tira o lámina o loncha de jamón serrano (si no tienes lo puedes hacer con tocineta)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta ',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Frita cada uno de los huevos por aparte',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Colocas en un sartén la mantequilla unos segundos y preparas el primer huevo. Agrega la sal pimienta al gusto y déjalo como una tapita de sándwich.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listo, continúa con el segundo huevo, haciendo los mismos pasos ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después a una de estas tapitas de huevo, adicionas la mantequilla, después el queso, la lonja de jamón y se cierra con la otra tapa de huevo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirve de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (221, '60', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Muslitos en camachips',
        'slug' => 'muslitos-en-camachips',
        'indice'=> 1,
        'carbs' => 17,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/muslitos-en-camachips.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Muslos de pollo, para mujer entre 180 a 200 gramos y hombres 220 a 260 gramos) pre cocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '4 (40 gramos) cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de salsa tártara casera o mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de zucchini sin cáscara picados en rodajas bien delgaditas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30ml de zumo de limón (2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Orégano en polvo',
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
    Ingredient::create([
        'name' => 'Ingredientes ensalada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de aguacate picado ( 6,8 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de rúcula picada  (2,4 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de lechuga picada (1,74 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de acelgas picadas (1,35 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de tomate picado a la juliana (0,78 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de cebolla picada a la juliana ( 0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 aceitunas verdes partidas a la mitad (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de chimichurri casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal y pimienta',
        'recipe_id' => $recipe->id
    ]);



    $x = 0;
    Instruction::create([
        'name' => 'Preparación de los muslitos y chips',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Iniciamos haciendo los chips de zucchini son los más demorados',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un plato pando o bandeja ponemos las rodajas de zucchini espolvoreamos con sal pimienta, orégano y limón',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas por unos 3 minutos y después con un pañito las secas muy bien, esto por que los zucchinis sueltan mucha agua',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguido  en  una bandeja forrado con papel parafinado, pones  las rodajas de zucchini separadas, una al lado de otra',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le rocías aceite de oliva y la llevas al horno entre 12 y 15 minutos o hasta que las veas crocantes ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ojo debes estar pendiente que no se quemen, si es necesario rociar más aceite o voltear las rodajas lo haces',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Para hacer los muslitos apanados, pones en un  tazón los huevos y los bates muy bien',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otro tazón pones el queso parmesano y empiezas el proceso',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Primero pasas un muslito en el tazón de huevo, después en el tazón de queso, repites estos pasos para que queden bien apanados',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones cada uno de ellos en un sartén a con manteca a fuego bajo por 5 minutos o hasta que doren',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listas las dos cosas emplatamos, ponemos los chip como cama, encima los muslitos y tu rica ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón agregamos todos  los vegetales excepto el aguacate salpimientas y revuelves ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añades el aguacate, la cucharada de chimichurri, aceite y salpimentar una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves cuando ya tengas tus muslitos chips ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (222, '60', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


       // Inicio Receta

       $recipe = Recipe::create([
        'name' => 'Rolli salmón',
        'slug' => 'rolli-salmon',
        'indice'=> 1,
        'carbs' => 0.24,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/rolli-salmon.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '80 gramos de salmón abierto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de aguacate picado en trozos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (10 gramos) cuchara de queso crema o crema agria',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (10 gramos) cucharada de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (1 gramos) diente de ajo finamente picado (0,24 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Hojas de laurel fresca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de aceite de oliva extra virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un refractaria previamente engrasada con mantequilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones el salmón abierto, le agregamos encima la cucharada de aceite, ajo, sal pimientas y lo esparces con una brocha para que quede bien cubierto y dejas conservando por 15 minutos mínimo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En esta misma refractaria le agregas una cucharada de mantequilla encima del salmón y las hojas de laurel',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y la llevas al horno por 15 minutos o hasta que esté en el punto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'A parte en un tazón pones el aguacate lo machacas con un tenedor',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas el queso crema o crema agria, el queso parmesano revuelves hasta lograr un puré',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ya listo tu salmón lo rellenas con el puré , y lo enrollas ( le puedes poner un palillo para evitar que se abra ) y al servir lo bañas con la mantequilla derretida que te quedó en la refractaria donde hiciste el salmón',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (223, '60', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Queso con aceite aromatizado',
        'slug' => 'queso-con-aceite-aromatizado',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/queso-con-aceite-aromatizado.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '40 gramos de queso manchego partido en cubos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 a 3 cucharadas de aceite de oliva extra-virgen aromatizado (si no tienes utilizas aceite de oliva natural y especies de tu gusto)',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón pones los cubos de queso y ba;as con el aceite',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si no tienes aceite aromatizado, le pones natural y le esparces las especies',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (224, '61', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta




    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Cerdofajitas',
        'slug' => 'cerdofajitas',
        'indice'=> 1,
        'carbs' => 10.36,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/cerdofajitas.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Lomo de cerdo partido en fajitas (mujer entre 180 a 200 gramos y hombres 220 a 260 gramos) sazonado a tu gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos cocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de queso parmesano (10 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/2 cucharadita de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) de queso crema o crema agria o mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de aguacate (8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de tomate partido a la juliana (0,78 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas grandes de lechuga ( 0,58 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 aceitunas enteras (0,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen aromatizado o natural',
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


    $x = 0;
    Instruction::create([
        'name' => 'Primero hacemos una salsita o pasta que pones debajo de las fajitas cuando estés emplatando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Esta salsita la haces colocando en un tazón el huevo picado, le agregas el queso parmesano, media cucharada de mantequilla salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Machacas y revuelves con un tenedor hasta quedar bien la pasta y reservas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después en un sartén con un poco de mantequilla o manteca o aceite de coco a fuego bajo pones a cocinar las fajitas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas sofreír por 10 minutos o hasta que ya estén en el punto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ya con todo listo empezamos a emplatar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ponemos la cama de lechugas, esparcimos la pasta de huevo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregamos las fajitas asadas, el tomate, el queso crema o crema agria o mayonesa casera y terminamos con las aceitunas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir rociamos con aceite de oliva y tu buena porción de aguacate',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (225, '61', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Se acabó el mercado',
        'slug' => 'se-acabo-el-mercado',
        'indice'=> 1,
        'carbs' => 0.24,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/se-acabo-el-mercado.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 cucharadas (20 gramos) de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de zucchini o calabacín picado en cuadros y sin cáscara',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de pollo desmechado pre cocido',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo finamente picado (0,24 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/3 de albahaca en polvo ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de salsa pesto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con un poco de mantequilla o manteca de cerdo o aceite de coco, pones a sofreír el ajo por 2 minutos o hasta que dore',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregamos el zucchini o calabacín  y dejamos sofreír por 1 minuto y seguido ponemos el  pollo revolvemos por dos minutos más apagamos y tapamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Simultáneamente en un sartén pequeño a fuego bajo pones el queso bien esparcido y espolvoreamos con la albahaca ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté burbujeando lo volteas y dejas por 1 minuto más retiras del sartén y pones en un plato pando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir le agregas lo que tienes conservando en el sartén y encima la cucharada de pesto y rocias con aceite ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (226, '61', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Pericos',
        'slug' => 'pericos',
        'indice'=> 1,
        'carbs' => 2.37,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/pericos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 a 3 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de cebolla finamente picada (0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de tomate finamente picado (0,78 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de zucchini partido en rodajas (0,66 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '35 gramos de queso mozzarella o el de tu gusto',
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
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón revuelves los huevos le agregas la cebolla tomate sal pimienta y revuelves una vez más dejas conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con mantequilla o manteca de cerdo o aceite de coco viertes los huevos y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas cocinar por 5 minutos o hasta que duren según tu gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otro sartén con un poco de mantequilla pones azar los zucchinis hasta que doren por lado y lado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato acompañado de queso',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (227, '62', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Corazon de amor',
        'slug' => 'corazon-de-amor',
        'indice'=> 1,
        'carbs' => 15.99,
        'time' => 25,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/corazon-de-amor.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Corazones de pollo (  mujer entre 180 a 200 gramos y hombres 220 a 260 gramos) limpios y lavados',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (4 gramos) diente de ajo finamente picado (0,98 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharada de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/4 taza de consomé de pollo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Palitos para insertar',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimiente',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'ingredientes ensalada',
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
        'name' => '7 a 10 aceitunas partidas a la mitad (1 gramo de carbohidrato)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos de apio en rama en trocitos (0,45 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de aguacate (8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de cilantro',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '',
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
        'name' => 'Preparación corazones de amor',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón ponemos un chorrito de aceite de oliva,  ajo, 1 cucharada de perejil, consomé ,los corazones y salpimentamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revolvemos todo muy bien y dejamos conservando por lo menos 15 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasado este tiempo ponemos todo en un sartén y dejamos cocinar de 10 a 15 minutos o hasta que los corazones ablanden',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiramos y pasamos a otro sartén con mantequilla y sofreímos a nuestro gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listo insertamos los corazones en los palitos y antes de servir le agregamos un chorrito de aceite de oliva y espolvoreamos con la otra cucharada de perejil ( si deseas servir sin palitos esta bien)',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Acompañamos con una rica ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En la licuadora colocamos el aguacate, cilantro, agua, aceite de oliva extra virgen, vinagre, sal y pimienta.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté todo incorporado dejas reposar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón pon el resto de los ingredientes y bañas los vegetales con la salsa que tienes en reposo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves con tus corazones de amor',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (228, '62', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



     // Inicio Receta

     $recipe = Recipe::create([
        'name' => 'Rollisorpresa',
        'slug' => 'rollisorpresa',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/rollisorpresa.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '3 cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de pollo desmechado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de cebolla finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de perejil',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite oliva extra virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón pones el pollo, cebolla, perejil, mayonesa, sal y pimienta, y un chorrito de aceite de oliva. Revuelves y dejas conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Aparte, en un sartén redondo y a fuego bajo pones el queso parmesano ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Te aseguras que quede bien esparcido para que la tortilla quede homogénea ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté burbujeando le agregas el relleno que tienes en el tazón y enrollas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (229, '62', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Conito relleno de amor',
        'slug' => 'conito-relleno-de-amor',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/conito-relleno-de-amor.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1 huevo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(10 gramos) cucharada de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/3 de orégano en polvo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/2 hoja de lechuga ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de carne desmechada lista y calientita',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de mayonesa con pimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón batimos el huevo, le agregamos orégano, queso y batimos nuevamente',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después en un sartén amplio y redondo vertemos   el huevo y esparcimos muy bien para que la tortilla nos quede bien delgadito',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos que se dore por lado y lado retiramos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un plato pando pones la tortilla le agregas la lechuga, carne desmechada, un chorrito de aceite y cierras en forma de cono ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato con la mayonesa para untar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (230, '63', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


     // Inicio Receta

     $recipe = Recipe::create([
        'name' => 'Croquetadas',
        'slug' => 'croquetadas',
        'indice'=> 1,
        'carbs' => 17.39,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/croquetadas.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Filete de pescados (mujer entre 180 a 200 gramos y hombres 220 a 260 gramos) partidos en trozos puede ser mero o merluza o el que te guste',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(4 gramos ) diente de ajo finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 (30 gramos) cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de lechuga hoja entera( 0,58 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(10 gramos) cucharada de crema agria',
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
        'name' => '80 gramos de aguacate picado ( 8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de lechuga crespa picada en trozos ( 1,74 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de  acelgas picada en trozos (2,25 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de rúcula picada en trozos (2,4 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '25 gramos de pimentón picado a la juliana ( 1,92 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadas (10 gramos) de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen natural o aromatizado',
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
        'name' => 'Preparación croquetas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ponemos en un tazón un chorrito de aceite, ajo, sal pimienta y revolvemos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguido ponemos los trozos de pescado para adobar y dejamos conservando 15 minutos mínimo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén a fuego alto con mantequilla sellamos por lado y lado los filetes de pescado y dejamos a parte para que enfríe',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Mientras están enfriando ponemos los huevos en un tazón  batimos y el  queso otro tazón ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ya con los filetes fríos pasamos cada uno primero en el huevo y seguido en el queso, repetimos este proceso para que cada filete quede bien apanado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otro sartén a fuego medio con manteca de cerdo o aceite de coco o mantequilla de vaca 100% de pastoreo pones los filetes a sofreír por ambos lados hasta que estén dorados y listos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves en una cama de lechuga y ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ponemos en un tazón todos los vegetales excepto el aguacate, bañamos con el aceite,  salpimentamos y revolvemos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir ponemos el aguacate, espolvoreamos con el queso , otro chorrito de aceite y salpimienta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y servimos de acompañante de nuestras croquetas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (231, '63', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Unidos somos más fuertes',
        'slug' => 'unidos-somos-mas-fuertes',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/unidos-somos-mas-fuertes.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '75 gramos de tocineta o panceta picadas en trozos ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de queso manchego o el de tu gusto, pero bien graso y picado en trozos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de mantequilla de vaca 100 % de pastoreo o manteca de cerdo o aceite de coco ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un sartén colocamos la mantequilla y sofría la tocineta.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté crocante añade los trozos de queso y revuelve por unos segundos.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sal pimientas a tu gusto y retiras de inmediato para que el queso no se derrita del todo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (232, '63', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


});
