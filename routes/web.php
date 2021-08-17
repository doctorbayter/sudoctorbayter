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

    Fase::create([
        'name' => '7 Días Keto',
        'sub_name' => 'Iniciemos<span class="text-red-700">Keto</span>',
        'descripcion' => 'Tus primeros pasos en la dieta Keto',
        'slug' => 'fase-0',
    ]);

    Day::create([
        'day' => 1,
        'fase_id' => 5,
    ]);
    Day::create([
        'day' => 2,
        'fase_id' => 5,
    ]);
    Day::create([
        'day' => 3,
        'fase_id' => 5,
    ]);
    Day::create([
        'day' => 4,
        'fase_id' => 5,
    ]);
    Day::create([
        'day' => 5,
        'fase_id' => 5,
    ]);
    Day::create([
        'day' => 6,
        'fase_id' => 5,
    ]);
    Day::create([
        'day' => 7,
        'fase_id' => 5,
    ]);

    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (71, '5', '99', CURRENT_TIMESTAMP, NULL),
    (72, '5', '100', CURRENT_TIMESTAMP, NULL),
    (73, '5', '101', CURRENT_TIMESTAMP, NULL),
    (74, '5', '102', CURRENT_TIMESTAMP, NULL),
    (75, '5', '103', CURRENT_TIMESTAMP, NULL),
    (76, '5', '104', CURRENT_TIMESTAMP, NULL),
    (77, '5', '105', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (71, '99', '1', CURRENT_TIMESTAMP, NULL),
    (72, '100', '1', CURRENT_TIMESTAMP, NULL),
    (73, '101', '1', CURRENT_TIMESTAMP, NULL),
    (74, '102', '1', CURRENT_TIMESTAMP, NULL),
    (75, '103', '1', CURRENT_TIMESTAMP, NULL),
    (76, '104', '1', CURRENT_TIMESTAMP, NULL),
    (77, '105', '1', CURRENT_TIMESTAMP, NULL)");


    /*
    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    (10, '4', '1', 'files/pdf/lista-de-alimentos-fase-4-1-dkp.pdf', CURRENT_TIMESTAMP, NULL)");
    */


    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    (8, 'Lista de Alimentos Semana Keto', 'files/pdf/lista-de-alimentos-fase-0-dkp.pdf', '5', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL),
    (9, 'Secretos Semana Keto', 'files/pdf/secretos-fase-0-dkp.pdf', '5', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");



    /*
    $users = User::where('email','!=','null')->skip(4000)->take(1000)->get();
    $fase = Fase::find(4);
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
    echo "Do it";
    */

    //$row = DB::table('day_recipe')->where('id', '=', '36')->update(['meal' => 1]);
    //DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (4, '3', '1', CURRENT_TIMESTAMP, NULL)");

    /*
    // Inicio Receta
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
    // Fin Receta\
    */

});
