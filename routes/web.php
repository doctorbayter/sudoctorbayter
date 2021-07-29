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


    $recipe = Recipe::create([
        'name' => '',
        'slug' => '',
        'indice'=> 1,
        'carbs' => ,
        'time' => ,
        'type' => 1,
    ]);
    $image = Image::create([
        'url' => 'recipes/.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => '',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (, '', $recipe->id, '', CURRENT_TIMESTAMP, NULL)");

    //Fin Receta
    */

    $recipe = Recipe::create([
        'name' => 'Salsa de albahaca',
        'slug' => 'salsa-de-albahaca',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-de-albahaca.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '100 ml de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de albahaca fresca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (1 gramo) diente de ajo',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Ponemos en la licuadora o procesadora todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Licuamos hasta que se incorporen muy bien todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos conservar por media hora antes de servir.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si no consumes toda la salsa, puedes guardarla en un recipiente cerrado en la nevera, pero no más de dos a tres días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);



    $recipe = Recipe::create([
        'name' => 'Salsa de queso con perejil',
        'slug' => 'salsa-de-queso-con-perejil',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-de-queso-con-perejil.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 cucharadas de queso crema',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharadas de crema agria',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de crema de leche',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón mezclar con un tenedor queso crema, crema agria y crema de leche.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando estén bien mezclados añadir el aceite de oliva y seguir mezclando.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez bien compacto agregamos el perejil y volvemos a revolver.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servir',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si no consumes toda la salsa, puedes guardarla en un recipiente cerrado en la nevera, pero no más de dos días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);



    $recipe = Recipe::create([
        'name' => 'Salsa verde aguacate',
        'slug' => 'salsa-verde-aguacate',
        'indice'=> 1,
        'carbs' => 9.5,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-verde-aguacate.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
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
        'name' => '1(15 ml) cucharada de zumo de limón (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de crema agria o queso crema',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/3 agua para mejorar la textura',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharadas de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal y pimienta al gusto',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Picar el aguacate en trozos para que sea más fácil procesar.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una licuadora o procesador colocar el aguacate, aceite de oliva, cilantro, limón, crema agria, sal pimienta.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sin apagar la licuadora añade un poco de agua para que logres la consistencia deseada.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servir y consumir el mismo día.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Aceite aromatizado de romero',
        'slug' => 'aceite-aromatizado-de-romero',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/aceite-aromatizado-de-romero.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1000 ml. de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 ramitas de romero fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 pepitas de pimienta roja',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 botella de vidrio y preferiblemente oscura',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la botella poner el aceite y dentro las ramitas de romero y la pimienta.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sellar muy bien y dejar en un lugar fresco conservando como mínimo 15 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puedes utilizar para todas las comidas y ensaladas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'No es necesario guardar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Aceite aromatizado de guindilla',
        'slug' => 'aceite-aromatizado-de-guindilla',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/aceite-aromatizado-de-guindilla.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1000 ml. De aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de guindillas frescas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de laurel fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 botella de vidrio y preferiblemente oscura',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la botella poner el aceite y dentro las guindillas y laurel.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sellar muy bien y dejar en un lugar fresco conservando como mínimo 15 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'O hasta que logremos la intensidad picante deseada.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puedes utilizar para todas las comidas y ensaladas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'No es necesario guardar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);



    $recipe = Recipe::create([
        'name' => 'Aceite aromatizado con ajo',
        'slug' => 'aceite-aromatizado-con-ajo',
        'indice'=> 1,
        'carbs' => 3.92,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/aceite-aromatizado-con-ajo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1000 ml. De aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '4 (16 gramos) dientes de ajo cortados a la mitad (3,92 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 pepitas de pimienta negra o roja según su gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de laurel fresca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 botella de vidrio y preferiblemente oscura',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la botella poner el aceite y dentro ajo, pimienta y hojas de laurel.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sellar muy bien y dejar en un lugar fresco conservando como mínimo 15 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'O hasta que logremos la intensidad deseada.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puedes utilizar para todas las comidas y ensaladas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'No es necesario guardar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Aceite aromatizado de orégano',
        'slug' => 'aceite-aromatizado-de-oregano',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/aceite-aromatizado-de-oregano.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1000ml. De aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '8 hojas de orégano frescas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '4 hojas de laurel frescas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 pizca de sal del Himalaya',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 botella de vidrio y preferiblemente oscura',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la botella poner el aceite y dentro las hojas de orégano, laurel y sal.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sellar muy bien y dejar en un lugar fresco conservando como mínimo 15 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'O hasta que logremos la intensidad deseada.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puedes utilizar para todas las comidas y ensaladas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'No es necesario guardar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Aceite aromatizado de tomillo y romero',
        'slug' => 'aceite-aromatizado-de-tomillo-y-romero',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/aceite-aromatizado-de-tomillo-y-romero.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1000ml. De aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '8 ramitas de romero frescas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '8 ramitas de tomillo frescas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 pizca de sal del Himalaya',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 botella de vidrio y preferiblemente oscura',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la botella poner el aceite y dentro las ramitas de romero, tomillo y sal.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sellar muy bien y dejar en un lugar fresco conservando como mínimo 15 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Hasta que logremos la intensidad deseada. ',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puedes utilizar para todas las comidas y ensaladas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'No es necesario guardar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Aceite aromatizado de especias',
        'slug' => 'aceite-aromatizado-de-especias',
        'indice'=> 1,
        'carbs' => 2.34,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/aceite-aromatizado-de-especias.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1000ml. De aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de laurel fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de orégano fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de tomillo fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de albahaca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de cebolla finamente picada (1,86 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (1 gramos) diente de ajo (0,48 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 clavo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 botella de vidrio y preferiblemente oscura',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la botella poner el aceite y dentro las hojas de laurel, orégano, tomillo, albahaca, cebolla, ajo y el clavo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sellar muy bien y dejar en un lugar fresco conservando como mínimo 20 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'O hasta que logremos la intensidad deseada.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puedes utilizar para todas las comidas y ensaladas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'No es necesario guardar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Aceite aromatizado de especias picante',
        'slug' => 'aceite-aromatizado-de-especias-picante',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/aceite-aromatizado-de-especias-picante.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1000ml. De aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de laurel fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de orégano fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de tomillo fresco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas de albahaca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de guindillas frescas o chile o ají',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 botella de vidrio y preferiblemente oscura',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En la botella poner el aceite y dentro las hojas de laurel, orégano, tomillo, albahaca, guindillas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sellar muy bien y dejar en un lugar fresco conservando como mínimo 15 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Hasta que logremos la intensidad deseada.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puedes utilizar para todas las comidas y ensaladas.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'No es necesario guardar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa pesto original',
        'slug' => 'salsa-pesto-original',
        'indice'=> 1,
        'carbs' => 0.49,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-pesto-original.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '80 gramos de hojas de albahaca fresca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo (0,49 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '120 ml. Aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Pizca de sal pimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En una licuadora o procesadora poner todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Licuar muy bien para que se incorporen todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si ves que está muy espeso le puedes añadir más aceite.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Conservar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa pesto aquesada',
        'slug' => 'salsa-pesto-aquesada',
        'indice'=> 1,
        'carbs' => 0.49,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-pesto-aquesada.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '6 hojas de albahaca fresca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo (0,49 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 (30 gramos) cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 o 4 cucharadas de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Si estás en fase dos, le puedes agregar almendras o piñones y este sería tu carbohidrato adicional',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En una licuadora o procesadora poner todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Licuar muy bien para que se incorporen todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si ves que está muy espeso le puedes añadir más aceite.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Conservar en nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);



    $recipe = Recipe::create([
        'name' => 'Salsa de pepino al cilantro',
        'slug' => 'salsa-de-pepino-al-cilantro',
        'indice'=> 1,
        'carbs' => 5.46,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-de-pepino-al-cilantro.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '150 gramos de crema agria o queso crema',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ralladura de medio limón',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de cilantro',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de pepino a la juliana o rebanadas súper finas (3,6 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de cebolla finamente picada (1,86 gr. CH)',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'En un tazón poner la crema agria, mayonesa, ralladura de limón y el cilantro.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revolver muy bien con un tenedor o espátula hasta que se incorporen todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después agregar el pepino, cebolla, salpimentar y volver a revolver.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejar al menos 15 minutos en la nevera antes de servir.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);



    $recipe = Recipe::create([
        'name' => 'Salsa de aceitunas y perejil',
        'slug' => 'salsa-de-aceitunas-y-perejil',
        'indice'=> 1,
        'carbs' => 1,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-de-aceitunas-y-perejil.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '130 gramos de crema agria o queso crema',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de perejil finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 a 7 aceitunas finamente picadas (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón poner la crema agria, mayonesa, perejil.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revolver muy bien con un tenedor o espátula hasta que se incorporen todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después agregar las aceitunas, aceite, salpimentar y volver a revolver.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejar al menos por 15 minutos en la nevera antes de servir.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa de tomate',
        'slug' => 'salsa-de-tomate',
        'indice'=> 1,
        'carbs' => 19.22,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-de-tomate.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '3 (300 gramos) tomates maduros, pelados y partido en cuadros (11,7 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (40 gramos) cebolla finamente picada (3,72 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (50 gramos) pimentón rojo picado en cuadros (3,8 gr. CH)',
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
        'name' => 'En un sartén con mantequilla y a fuego bajo sofreímos la cebolla y el pimentón hasta que la cebolla coja color rojizo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añadimos el tomate y dejamos cocinar durante 35 minutos revolviendo constantemente para evitar que se pegue.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si ves que se está secando debemos añadir un poco más de mantequilla, pero ojo sin que quede muy aguado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiramos del sartén y pasamos todo por la licuadora o procesadora mas el aceite de oliva.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez esté bien licuado sin grumos ponemos una vez más en el sartén a fuego bajo por 30 minutos más.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Salpimentamos al gusto y apagamos.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejamos enfriar y llevamos a la nevera.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Debemos consumir en máximo dos días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa bechamel',
        'slug' => 'salsa-bechamel',
        'indice'=> 1,
        'carbs' => 3.72,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-bechamel.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '300ml de crema de leche',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(40 gramos) de cebolla cortada a la juliana (3,72 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 hoja de laurel',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 ramas de perejil',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 pepas de pimienta negra',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3(30 gramos) 3 cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 pizca de nuez moscada',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En una olla y a fuego bajo, ponemos la crema de leche, cebolla, laurel, perejil y las pepitas de pimienta.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando hierva, debes apagar y deja reposar por 20 minutos y después cuela y conserva.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otra olla a fuego bajo derrite la mantequilla y agrega el queso. parmesano, para obtener una masa espesa y retira del fuego.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después a fuego bajo vuelve a poner la olla agrega la leche que tenias conservando y sigue revolviendo por 2 minutos.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agrega la pizca de nuez moscada y sal pimienta.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si vas a guardar debes conservarla en el refrigerador.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa tártara',
        'slug' => 'salsa-tartara',
        'indice'=> 1,
        'carbs' => 2.86,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-tartara.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '300 gramos de mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de alcaparras finamente picadas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (20 gramos) cebolla finamente picada (1,86 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (15mil) cucharada de limón (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón poner todos los ingredientes.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Salpimiente al gusto y con un tenedor empieza a revolver para que todo se incorpore bien.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejar conservar mínimo 20 minutos antes de servir.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa verde',
        'slug' => 'salsa-verde',
        'indice'=> 1,
        'carbs' => 2,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-verde.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '3 cucharadas de alcaparras finamente picadas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharadas de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de albahaca finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de menta finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 ramita de cebolla larga (tallo) finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (2 gramos) diente de ajo machacado (0,49 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de vinagre de cidra de manzana',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '8 cucharadas de aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimenta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón poner la cebolla, el ajo, alcaparras y revolver con un tenedor o espátula.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Luego debes agregar el perejil. Albahaca, menta, salpimentar y seguir revolviendo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sin dejar de revolver debes agregar el vinagre y aceite.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si ves que está muy espeso puedes agregar más aceite de oliva.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguir revolviendo y dejar conservar por 20 minutos mínimo antes de servir.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si deseas puedes guardar en la nevera hasta por 2 días.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa holandesa',
        'slug' => 'salsa-holandesa',
        'indice'=> 1,
        'carbs' => 2,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-holandesa.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1 cucharada de vinagre de cidra de manzana',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (30 ml) cucharada de zumo de limón (2 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 yemas de huevo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '175 gramos de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En una ollita poner el vinagre y limón dejar hervir y apagar.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otra ollita o en el microondas derretir la mantequilla y dejar conservar.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En la batidora ponga las yemas, sal pimienta y bata por 1 minuto.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sin dejar de batir añade la mezcla del limón y la mantequilla ya líquida, pero ojo esta última debe estar caliente aún.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Debes batir hasta que espese y servir de inmediato.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa rosada',
        'slug' => 'salsa-rosada',
        'indice'=> 1,
        'carbs' => 5.66,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-rosada.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '150 gramos de mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de salsa de tomate casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Unas gotas de tabasco o ají',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de pimiento rojo finamente picado (3,8 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '20 gramos de cebolla finamente picada (1,86 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón poner todos los ingredientes y revolver con un tenedor o espátula muy bien.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sal pimentar al gusto y seguir revolviendo hasta que todo se incorpore.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejar en la nevera conservando mínimo 20 minutos.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);




    $recipe = Recipe::create([
        'name' => 'Salsa criolla',
        'slug' => 'salsa-criolla',
        'indice'=> 1,
        'carbs' => 14.3,
        'time' => 15,
        'type' => 4,
    ]);
    $image = Image::create([
        'url' => 'recipes/salsa-criolla.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '200 gramos de tomate finamente picado y pelado (7, 8 gramos de carbohidratos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de cebolla finamente picada (4,6 gramos de carbohidratos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '25 gramos de pimiento rojo finamente picado (1,9 gramos de carbohidratos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharadas de vinagre de sidra de manzana',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'aceite de oliva extra virgen',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En el frasco de vidrio vamos a poner el tomate, cebolla, pimiento, perejil, salpimentamos y removemos con una cuchara de palo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Luego le agregamos un buen chorro de aceite de oliva y el vinagre.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Tapamos el frasco y agitamos para que todo se mezcle muy bien.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se deja conservando en la nevera durante 2 días mínimo antes de consumir.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


});
