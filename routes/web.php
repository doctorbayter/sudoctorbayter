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

    /*
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (190, '49', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    */


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Chicarronada',
        'slug' => 'chicarronada',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/chicarronada.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '80 gramos de chicharrón carnudo o panceta',
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
        'name' => 'Gotas de limón',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Colocar los chicharrones en un sartén hondo, le rocías las especies, limón y salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas cocinar por 15 minutos o cuando ya estén crujientes (revolver constantemente para evitar que se peguen)',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (191, '50', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Salmón con cilantro',
        'slug' => 'salmon-con-cilantro',
        'indice'=> 1,
        'carbs' => 15.59,
        'time' => 25,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/salmon-con-cilantro.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Salmón con piel (Mujer entre 180 a 200 gramos, hombre entre 220 a 240 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Si no tienes salmón no te preocupes, puedes consumir cualquier proteína grasosa que tengas.',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de cebolla picada a la juliana ( 2,79 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de tomate cherry picados en dos ( 2,34 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30ml de zumo de limón y además rodajas de limón ( 2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de cilantro fresco finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 hoja de papel de hornear',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes ensalada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de espinacas partidas en trozos (0,84 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de rúcula partidas en trozos (2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de lechuga romana (1,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de pepino picado en cuadritos (2,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de aguacate picada a la juliana (8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de coliflor partido en trocitos (0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de salsa ranchera casera (o el aderezo de tu gusto)',
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
        'name' => 'Preparación salmón',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón ponemos el lomo de salmón, lo rociamos con aceite de oliva, zumo de limón y salpimentamos y dejamos conservando por 15 minutos mínimo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una refractaria ponemos el papel de hornear',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Encima el salmón, le agregamos la cebolla, tomate y espolvoreamos con el cilantro',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cerramos muy bien la hoja y llevamos al horno de 15 a 20 minutos o hasta que esté a tu gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servimos de inmediato con una rica ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones en un tazón las espinacas, rúcula, lechuga, coliflor, pepinos revuelves y salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregas, las dos cucharadas de salsa ranchera un chorrito de aceite y revuelves una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregar al aguacate, espolvoreamos con el huevo y sal pimentas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir con bañas con un poco más de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (192, '50', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta

    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Champiñones ajilludos',
        'slug' => 'champinones-ajilludos',
        'indice'=> 1,
        'carbs' => 3.12,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/champinones-ajilludos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '80 gramos de champiñones en láminas (2,64 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2gramos) diente de ajo finamente picado (0, 48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de perejil finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con un poco mantequilla y a fuego bajo pones a sofreír el ajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez doradito agregamos los champiñones y media cucharada de perejil (guardamos la otra media) salpimentamos y cocinamos por 5 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si ves que están muy secos le puedes poner un poco más de mantequilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servimos de inmediato espolvoreamos la otra mitad de perejil y un buen chorro de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (193, '50', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Omelette con chicharrón',
        'slug' => 'omelette-con-chicharron',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/omelette-con-chicharron.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de queso crema o crema agria (10 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 lonja o loncha de jamón serrano (25 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '35 gramos de queso manchego en trocitos (o el queso de tu gusto, pero preferiblemente graso)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de chicharrones naturales picados en trocitos bien pequeños',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón poner los dos huevos, añadir el queso crema o crema agria, salpimentar y batir muy bien hasta que todo se incorpore',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con mantequilla o manteca o aceite de coco y a fuego bajo pon la mezcla del huevo y tapa',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando la mezcla esté doradita',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pon el queso, el jamón y dobla para que el relleno quede cubierto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando veas que el queso empieza a derretir tapa y apagas y dejas por 2 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Al servir añade espolvoreado con los chicharrones',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (194, '51', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Hígado de pollo encebollado',
        'slug' => 'higado-de-pollo-encebollado',
        'indice'=> 1,
        'carbs' => 15.73,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/higado-de-pollo-encebollado.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => ' Hígados de pollo limpios (Mujer entre 180 a 200 gramos, hombre entre 220 a 240 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Si no tienes hígados no te preocupes, puedes consumir cualquier proteína grasosa que tengas.',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de orégano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de tomillo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de laurel',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de cebolla picada a la juliana (4,65 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo finamente picado (0,48 grados de carbohidratos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 taza (250 ml) de consomé de pollo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen natural',
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
        'name' => '80 gramos de coliflor (3,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => ' 1 (1 gramos) diente de ajo finamente picado ( 0,24 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de aguacate (5,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 aceitunas finamente picadas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de pepino sin cáscara picado en cuadritos (2,16 gr. CH)',
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
        'name' => 'Aceite de oliva extra virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de vinagre balsámico',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Preparación hígados',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón pones los hígados, le agregas las especies el consomé de pollo, salpimientas y revuelves.  Dejas conservando mínimo 2 horas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con mantequilla o manteca de cerdo o aceite de coco, pones la cebolla y el ajo a sofrita hasta que doren',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando estén doraditos le agregas el hígado con el consomé y todo lo del tazón y subes el fuego a medio bajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas cocinar por 20 minutos o hasta que los hígados estén a punto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si aún no están blandos le puedes agregar mas consomé y si no tienes un poco de agua',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación del arroz de coliflor y algo más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas solo la parte blanca del coliflor lavada y limpia',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Lo partes en trozos y lo llevas a un procesador o licuadora hasta que se deshaga y quede similar a las pepitas de arroz',
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
        'name' => 'Dejas cocinar por 10 minutos o hasta que esté doradito',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Apagas y le agregas la albahaca revuelves y tapas por 2 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Mientras en un tazón pones el aguacate, las aceitunas y el pepino, salpimientas y lo bañas con aceite de oliva y el vinagre balsámico',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato, ya con todo listo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (195, '51', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Envuelto de tocineta con pollo',
        'slug' => 'envuelto-de-tocineta-con-pollo',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/envuelto-de-tocineta-con-pollo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '70 gramos de pernil de pollo (sazonado a tu gusto) , picados en forma de dedos, y que te salgan dos deditos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 lonchas o lonja de tocineta enteras (50 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Precalentar el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Toma una de las lonchas de tocineta y envuelve el dedo de pollo si ves que se desprende lo puedes asegurar con un palillo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Repite lo mismo con la otra tocineta y el dedo de pollo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listos ponlos en una refractaria previamente untada con mantequilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y además ponle a cada dedo un pedacito de mantequilla encima',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Lleva al horno por 10 minutos y dale vuelta para que dore y deja otros 10 minutos o el tiempo necesario hasta que cocine el pollo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'el tiempo necesario hasta que cocine',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir espolvoreamos con el queso y un chorrito de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (196, '51', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Sencillamente seamos amigos',
        'slug' => 'sencillamente-seamos-amigos',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 5,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/sencillamente-seamos-amigos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '40 gramos de queso manchego partido en cuadritos o de tu gusto preferiblemente graso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 pocillo de café negro',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen aromatizado',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'La mitad del queso lo pones dentro del café para que derrita, ojo el café debe estar bien caliente',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y la otra mitad le agregas un chorrito de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (197, '52', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Alitas de pollo en salsa picante',
        'slug' => 'alitas-de-pollo-en-salsa-picante',
        'indice'=> 1,
        'carbs' => 19.91,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/alitas-de-pollo-en-salsa-picante.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Alitas de pollo limpias y listas (Mujer entre 180 a 200 gramos, hombre entre 220 a 240 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 taza de caldo de pollo (250 ml)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de tomillo (o especie de tu gusto)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de cebolla finamente picada (1,86 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de pimentón finamente picado (2,3 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo finamente picado (0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos del tallo de apio en rama (0,46 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de ají o chile finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes para la ensalada bañada en salsa de aguacate',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de lechuga romana partida en trozos (1,74 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de repollo morado (1,34 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de rúcula (1,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de tomate cherry (1,56 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de cebolla picada a la juliana (0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salsa de aguacate casera la debes hacer con máximo 80 gramos de aguacate, y cuando lo hagas no le pongas ají a la salsa pues tus alitas son picantes ( 8,04 gr. CH)',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Precalentar el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ponemos en un tazón las alitas, le agregamos el tomillo, ajo, cebolla, pimentón, apio, ají o chile, salpimentamos y las bañamos con aceite de oliva, revolvemos y dejamos conservar mínimo 1 hora',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasado este tiempo pasamos el pollo con todo lo que tiene en una refractaria, le agregamos el consomé y llevamos al horno',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos por 30 minutos y vamos probando si lo picoso es de nuestro gusto o si debes agregar un poco más de ají',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Esperamos 10 minutos más o el tiempo que sea necesario para que se doren las alitas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiramos y servimos de inmediato con una rica ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación para la ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón pones todos lo ingredientes, salpimientas y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir agregas la salsa de aguacate',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves con tu plato fuerte de alitas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (198, '52', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Tortiunicolor',
        'slug' => 'tortiunicolor',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/tortiunicolor.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '50 gramos de zucchini picado en trocitos y solo la parte blanca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '35 gramos de queso cabra o el de tu gusto preferiblemente graso picado en trocitos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón batir los huevos y salpimentar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añadir los trozos de queso y zuquini y batir nuevamente',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con un poco de mantequilla o manteca de cerdo o aceite de coco y a fuego bajo verter los huevos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejar que forme una tortilla y dore por lado y lado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servir de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (199, '52', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Portobello tres quesos',
        'slug' => 'portobello-tres-quesos',
        'indice'=> 1,
        'carbs' => 3.9,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/portobello-tres-quesos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1 portobello de 100 gramos (3,9 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de queso azul finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de queso cabra finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de queso holandés finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (50 gramos) lonjas o lonjas de tocino o tocineta finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de albahaca fresca finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Precalentamos el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Limpiamos el portobello y le quitamos el corazón',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos bien limpio y hueco y dejamos aparte',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con media cucharadita de mantequilla, sofritas el tocino por 3 minutos o hasta que esté crocante',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones el portobello en una refractaria previamente untada de mantequilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Rellenas con el queso azul, después la tocineta con la manteca que soltó y le agregas los otros quesos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Llevas al horno por 10 minutos o hasta que los quesos derritan',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir rociar con un poco de aceite de oliva y espolvoreamos con la albahaca',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (200, '53', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Rellenalo a tu gusto',
        'slug' => 'rellenalo-a-tu-gusto',
        'indice'=> 1,
        'carbs' => 18.18,
        'time' => 25,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/rellenalo-a-tu-gusto.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '160 gramos de carne desmechada, precocida',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de zucchini partido en dos (3,3 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo finamente picado (0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharada de salsa de tomate con albahaca casera, recuerda hacerla con un tomate de 60 gramos máximo (2,64 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
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
        'name' => '50 gramos de col rizado picado en trozos (2,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de lechuga morada o crespa picada en trozos (1,16 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de espinacas picadas en trozos (0,84 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de aguacate picado en cuadros (6,8 gr. CH)',
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
        'name' => 'Preparación zucchini',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Precalentar el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Con una cuchara sacar la carne del zucchini y dejarla aparte.  Ojo debes hacer este proceso con cuidado pues la idea es que el zucchini quede hueco y entero',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con un poco de mantequilla y a fuego bajo sofreír el ajo por dos minutos o hasta que esté doradito',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregar la carne del zuquini que tienes a parte, salpimentar revolver, dejar por un minuto y agregar la carne desmechada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revolver y cocinar por dos minutos más y apagar',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una refractaria previamente untada con mantequilla poner los zuchinis',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Rellenar cada uno primero con la salsa de tomate y albahaca',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y seguido el guiso de la carne del zucchini y carne desmechada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Espolvorear con el queso gruyer por encima',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y llevar al horno por 15 minutos o hasta que el zucchini esté blando y el queso dorado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir bañar con un poco de aceite de oliva y salpimentar una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones en un tazón todos los ingredientes, excepto el aguacate salpimientas y revuelves muy bien',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregas vinagre, aceite de oliva, sal pimienta y revuelves una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves con tus zucchinis rellenos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (201, '53', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Huevos tricolor',
        'slug' => 'huevos-tricolor',
        'indice'=> 1,
        'carbs' => 2.8,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/huevos-tricolor.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 ( 1 gramo) diente de ajo finamente picado ( 0, 24 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de champiñones en laminas ( 0,99 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de pimentón rojo finamente picado (0,77 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos de zuqini amarillo finamente picado (0,49 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de apio en rama finamente picado ( 0,31 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de queso parmesano ( 20 gramos)',
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


    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con mantequilla y a fuego bajo sofritas el ajo por 1 minuto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregar una cucharada más de mantequilla,  champiñones, pimentón, zucchini, apio salpimentar y sofreír por 2 minutos más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añadir lo huevos directamente en el sartén y revolver',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejar que se cocine por debajo como tortilla y por encima que este líquido y ahí revolver una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'La idea es que queden revueltos pero en trozos grandes',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listos espolvorear con queso parmesano',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (202, '53', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (203, '54', 51, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Para chuparse los dedos',
        'slug' => 'para-chuparse-los-dedos',
        'indice'=> 1,
        'carbs' => 14.78,
        'time' => 30,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/para-chuparse-los-dedos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Ingredientes para chuparse los dedos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Costillas de cerdo carnosas limpias y listas (Mujer entre 180 a 220 gramos, hombre entre 220 a 260 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (4 gramos) (0,98 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 ml de zumo de limón (2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen natural',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de romero fresco finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de laurel fresco finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '750ml (2 tazas de consomé de pollo o carne)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes para la ensalada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de brócoli en trozos (2,2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de pepino a la juliana (1,8 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '7 a 10 aceitunas partidas a la mitad (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos de apio en rama en trocitos (0,45 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de cebolla picada a la juliana (0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de tomate cherry partidos a la mitad (1,17 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de aguacate partido en cuadritos (4,25 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 a 4 cucharadas de salsa de albahaca casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Preparación para chuparse los dedos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón ponemos el ajo, el zumo de limón, romero, laurel y una buena cantidad de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revolvemos muy bien y dejamos conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Iniciamos a cocinar las costillas en una olla a presión.  Pones el caldo a hervir, una vez esté burbujeando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Ponemos las costillas enteras y dejamos por 15 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiramos las costillas de la olla y secamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez frías las partimos de acuerdo con tu gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasamos las costillas a una refractaria y las bañamos con lo que tenemos en el tazón, asegúrate que todas queden bien bañadas en la salsa',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y dejamos conservando por 15 minutos más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de llevar al horno le agregamos medio pocillo del consomé de carne o pollo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y dejamos por 20 minutos más o hasta que estén bien cocidas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listas servimos de inmediato con tu ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación de la ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón pones todos los vegetales, salpimientas y bañas con el aderezo de salsa de albahaca, revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Al servir le agregas esparcido el aguacate y salpimientas una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (204, '54', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Brochetas con personalidad',
        'slug' => 'brochetas-con-personalidad',
        'indice'=> 1,
        'carbs' => 4.64,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/brochetas-con-personalidad.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '8 huevos de codorniz cocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de queso de azar partidos en trozos grandes',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 palitos para insertar',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '4 cucharadas de salsa de aguacate, debes hacerla máximo con 40 gramos de aguacate (4,64 gr. CH)',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Insertas en cada palito los ingredientes intercalados y proporcionales',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves y bañas con la salsita de aguacate',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (205, '54', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Espinacas hago lo que quiera',
        'slug' => 'espinacas-hago-lo-que-quiera',
        'indice'=> 1,
        'carbs' => 1.39,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/espinacas-hago-lo-que-quiera.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '60 gramos de espinacas enteras (0,84 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de apio en rama (0,31 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (1 gramos) diente de ajo finamente picado (0,24 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 lonja o loncha de tocineta finamente picada (25 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de queso de cabra o el que tengas preferiblemente graso y que derrita',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con un poco de mantequilla y a fuego bajo ponemos el ajo, apio, salpimentamos y dejamos que dore',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añadimos la tocineta revolvemos y dejamos 1 minuto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pasado este tiempo aumentamos el fuego agregamos las espinacas, revolvemos y dejamos 2 minutos máximo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregamos los trozos de queso, un buen chorro de aceite de oliva salpimentamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Apagamos de inmediato y tapamos para que el queso derrita con el vapor',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servimos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (206, '55', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Ketoasado',
        'slug' => 'ketoasado',
        'indice'=> 1,
        'carbs' => 7.46,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/ketoasado.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Carne de res grasa  (Mujer entre 160 a 180 gramos, hombre entre  200 a 220 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de chicharrón',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de chorizo español',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de espárragos ( 2,34 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50  gramos de cebolla partida en rodajas (4,64 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 ( 2 gramos) diente de ajo finamente picado ( 0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Especies al gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'salpimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Guacamole casero',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón pones la carne, el chicharrón, chorizo, espárragos y las rodajas de cebolla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas el ajo, especies, salpimientas y ba;as en una buena cantidad de aceite de oliva y dejas conservando por lo menos 3 horas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Unas vez pasado este tiempo pones todo al carbón, incluso los espárragos y los aros de cebolla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos al gusto y servimos con un rico guacamole',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (207, '55', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Rellenitos',
        'slug' => 'rellenitos',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/rellenitos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos cocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas de crema agria',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'salpimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con agua, hervir  los huevos por 17 minutos máximo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez estén los huevos se dividen  se retira la yema, y se deja aparte la clara.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => ' En un tazón se coloca la yema,  1 cucharada de  aceite  de oliva extra virgen, crema agria y sal pimientas al gusto',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se machaca con un cubierto hasta que todo quede incorporado.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez esté listo rellenamos con mucho cuidado las claras, se espolvorea con el queso',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'antes de servir,  rocías con un poco mas de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (208, '55', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Sencillamente sandwich',
        'slug' => 'sencillamente-sandwich',
        'indice'=> 1,
        'carbs' => 0.78,
        'time' => 10,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/sencillamente-sandwich.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Manteca de cerdo o mantequilla de vaca 100% de pastoreo, aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de tomate en rodajas (0,78 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 ( 20 gramos) cucharada de queso crema o crema agria o mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de perejil',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Ponemos en un tazón la carne desmechada, perejil, un chorrito de aceite de oliva, crema agria o queso crema o mayonesa casera, revolvemos y dejamos conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguido  bates por aparte cada uno de los huevos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén  colocas la mantequilla unos segundos y prepara el primer huevo le agregas sal pimienta al gusto y lo dejas como una tapita de sándwich.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez  listo haces con el segundo huevo lo mismo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después a una de estas tapitas de huevo le pones la carne desmechada esparcida',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Encima las rodajas de tomate y cierras tu sándwich con la otra tapita de huevo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (209, '56', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta



    // Inicio Receta

    $recipe = Recipe::create([
        'name' => 'Langostinos cremoketosos',
        'slug' => 'langostinos-cremoketosos',
        'indice'=> 1,
        'carbs' => 11.27,
        'time' => 20,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/langostinos-cremoketosos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => 'Langostinos precocidos y listos   (Mujer entre 180 a 200 gramos, hombre entre  220 a 280 gramos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de cebolla finamente picada ( 1,86 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 ( 3 gramos) diente de ajo finamente picado ( 0,72 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Una pizca de chile o ají finamente picado (opcional)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '4 (40 gramos) cucharadas de queso crema o crema agria o mejor aún mitad y mitad',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de perejil fresca  finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de albahaca fresca  finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes para la ensalada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de cogollitos europeos partidos en trozos (0,75 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de espinacas partidas en trozos ( 0,7 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gr. de acelgas picadas(2,7 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3( 40 gramos)  tomates cherry partidos en la mitad (1,56 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de cebolla roja  picada a la juliana(0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 aceitunas  partidas a la mitad (0,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de aguacate picado en cuadritos ( 4,25 gr. CH) ',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de vinagre de cidra de manzana',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta al gusto',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Preparación langostinos cremoketosos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con un poco de mantequilla y a fuego bajo sofríes la cebolla,  ajo y la pizca de chili o ají, hasta que dore',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Incorporamos la crema de leche o crema agria, la mitad del perejil y albahaca, revolvemos y casi de inmediato agregamos los langostinos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Salpimentamos y dejamos que se penetren todos los ingredientes, por 5 minutos máximo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Espolvoreamos los langostinos cremosos con la otra mitad de perejil y albahaca, tapamos y apagamos ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos 1 minuto más antes de servir con una rica ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación  ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón se ponen todos los vegetales excepto el aguacate, salpimentamos y revolvemos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se le agregan las dos cucharadas de vinagre un buen chorro de  aceite de oliva aromatizado y se mezcla una vez más  ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir le esparces los cuadritos de aguacate, agregas más aceite y salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y ahí si sirves con tus langostinos cremosos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (210, '56', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta


    // Inicio Receta

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (211, '56', 27, '3', CURRENT_TIMESTAMP, NULL)");

    // Fin Receta
});
