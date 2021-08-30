<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Masterclass;
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
use App\Models\Video;
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

Route::get('masterclass/dkp/replay', [Masterclass::class, 'replay'])->name('masterclass.replay');
Route::get('masterclass/dkp/register', Masterclass::class)->name('masterclass.register');
Route::get('masterclass/dkp/thanks', [Masterclass::class, 'thanks'])->name('masterclass.thanks');


Route::get('/110', function () {
    return view('no-disponible');
});

//php artisan migrate:fresh --seed --force

Route::get('x/sql/', function(){


    $users = User::where('email','!=','null')->skip(3000)->take(1000)->get();
    $userc= 0;
    foreach($users as $user){

        $user_fases = $user->fases;
        $f1=0;
        $f2=0;
        $f3=0;
        $f4=0;
        $f5=0;
        $fase1=0;
        $fase2=0;
        $fase3=0;
        $fase4=0;
        $fase5=0;

        foreach($user_fases as $user_fase){
            if($user_fase->id = 1){
                $f1 = $f1+1;
                $fase1=$user_fase;
            }else if($user_fase->id = 2){
                $f2 = $f2+1;
                $fase2=$user_fase;
            }else if($user_fase->id = 3){
                $f3 = $f3+1;
                $fase3=$user_fase;
            }else if($user_fase->id = 4){
                $f4 = $f4+1;
                $fase4=$user_fase;
            }else if($user_fase->id = 5){
                $f5 = $f5+1;
                $fase5=$user_fase;
            }
        }

        if($f1 > 1){
            $fase1->clients()->detach(auth()->user()->id);
            $fase1->clients()->attach(auth()->user()->id);
        }else if($f2 > 1){
            $fase2->clients()->detach(auth()->user()->id);
            $fase2->clients()->attach(auth()->user()->id);
        }
        else if($f3 > 1){
            $fase3->clients()->detach(auth()->user()->id);
            $fase3->clients()->attach(auth()->user()->id);
        }
        else if($f4 > 1){
            $fase4->clients()->detach(auth()->user()->id);
            $fase4->clients()->attach(auth()->user()->id);
        }
        else if($f5 > 1){
            $fase5->clients()->detach(auth()->user()->id);
            $fase5->clients()->attach(auth()->user()->id);
        }
        $userc = $userc + 1;
    }

    echo $userc;

    // Video::create([
    //     'iframe' => '<iframe src="https://player.vimeo.com/video/593568599" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
    //     'videoable_id' => 105,
    //     'videoable_type' => 'App\Models\Day'
    // ]);


    //$day_recipes= DB::select("SELECT * FROM day_recipe");
    //print_r(json_encode($day_recipes));
});


Route::get('x/recipes/', function(){
    $recipes = Recipe::all();
    print_r($recipes);
});

Route::get('x/api/', function(){
    $days = Day::all();
    echo $days;
    //$fase_week = Fase::find(2);
    //dd($fase_week->clients());
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

    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    (8, 'Lista de Alimentos Semana Keto', 'files/pdf/lista-de-alimentos-fase-0-dkp.pdf', '5', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL),
    (9, 'Secretos Semana Keto', 'files/pdf/secretos-fase-0-dkp.pdf', '5', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    (11, '5', '1', 'files/pdf/lista-de-alimentos-fase-0-1-dkp.pdf', CURRENT_TIMESTAMP, NULL)");


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Aguatón',
        'slug' => 'aguaton',
        'indice'=> 1,
        'carbs' => 5.1,
        'time' => 20,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/aguaton.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '60 gramos de aguacate, dejas el aguacate con todo y cáscara (5,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'lo ideal es que sea un aguacate pequeño, para que lo puedas partir a la mitad y te quede la porción con el hueco cuando le retires la pepa',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (50 gramos) de tocino finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de perejil',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '35 gramos de queso holandés partido en cuadritos o el queso de tu gusto preferiblemente graso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen si es aromatizado mejor aun',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Orégano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Precalentamos el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con un poquito de mantequilla ponemos a sofreír el tocino',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando estén doraditos agregamos el perejil revolvemos, dejamos por 1 minuto más apagamos y tapamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'A la mitad del aguacate, ya sin pepa le rociamos un poco de aceite de oliva, orégano y sal pimiento',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Rellenamos la cavidad del aguacate con la tocineta y los trozos de queso',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Espolvoreamos con más orégano y llevamos al horno por 8 minutos o hasta que el queso derrita',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiramos del horno y antes de servir salpimentamos nuevamente y agregamos un buen chorro de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (254, '99', 253, '1', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Pizza mariketo',
        'slug' => 'pizza-mariketo',
        'indice'=> 1,
        'carbs' => 3.93,
        'time' => 25,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/pizza-mariketo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '100 gramos de pernil de pollo precocido molido',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de camarones precocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de calamar precocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '7 a 10 aceitunas (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salsa de tomate cacera con albahaca (2,64 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de lechuga morada (0,29 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de queso mozarela partido en cuadritos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1/2 cucharadita de especies (orégano, tomillo y laurel todo en polvo)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Precalentar el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un procesador o licuadora pones el pollo, huevo, especies y salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Licuas hasta que el pollo este bien molido',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiras y pones en un tazón y le agregas el queso parmesano y con un tenedor o la mano revuelves todo muy bien',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén de forma circular y pando previamente con mantequilla para evitar que se pegue la mas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Empiezas a esparcir la masa y elaborar la pizzeta, ojo debe quedar repartida en todo el sartén (recuerda que este puede ir al horno o estufa a fuego bajo)',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando veas que está dorando, le das vuelta y así lograr mejor cocción',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes que empiece a dorar por el otro lado, inicias a colocar los ingredientes',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Primero la base de tomate, el queso, lechugas, camarones, calamares',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En fin, según tu gusto, si estás haciendo tu pizza en estufa la tapas para que aumentes el calor y el queso derrita',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez lista sirves de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (255, '99', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");

    Video::create([
        'iframe' => '<iframe src="https://player.vimeo.com/video/588455726" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
        'videoable_id' => $recipe->id,
        'videoable_type' => 'App\Models\Recipe',
    ]);
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Totopos la coodorniu',
        'slug' => 'totopos-la-coodorniu',
        'indice'=> 1,
        'carbs' => 1.17,
        'time' => 15,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/totopos-la-coodorniu.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '3 (30 gramos) queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '8 huevos de codorniz listos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 (30 gramos) cucharadas de tomate con albahaca casero (1,17 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen aromatizado',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un sartén redondo y pequeño colocas el queso parmesano bien esparcido a fuego bajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté burbujeando le das vuelta y dejas que dore',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Lo retiras y de inmediato empiezas a cortar la tortilla en triangulitos debe ser muy rápido antes que el queso endurezca',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Con anterioridad has pelado los huevos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves los huevos y roseas con un poquito de salsa, una buena cantidad de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y el resto de salsa la sirves para acompañar con los totopos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (256, '99', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta

    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Ponchazuquini',
        'slug' => 'ponchazuquini',
        'indice'=> 1,
        'carbs' => 2.39,
        'time' => 20,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/ponchazuquini.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de zucchini partido en rodajas bien delgadas (1,65 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (25 gramos) lonja o loncha de tocineta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(10 gramos) cucharada de queso crema o crema agria',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 ajo (1 gramo) finamente picado (0,24 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 aceituna finamente picadas (0,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de mantequilla de vaca 100% de pastoreo',
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
        'name' => 'En un sartén con mantequilla sofríe el ajo sin que se dore mucho',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añades las rodajas de zucchini y los salteamos por unos 3 minutos máximo.',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añades el tocino o jamón serrano, la cucharada de queso crema o crema agria revuelves por dos minutos más, apagas y tapas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén pones hacer los huevos ponchados de forma tradicional',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listos, ponemos en un plato pando la cama del zucchini y encima los huevos ponchados, las aceitunas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Antes de servir rociamos con un poco de aceite de oliva y salpimentamos una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (257, '100', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Burratas',
        'slug' => 'burratas',
        'indice'=> 1,
        'carbs' => 12.73,
        'time' => 25,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/burratas.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (40 gramos) lonchas o lonjas de queso manchego o el queso de tu gusto, pero graso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '4 (40 gramos) cucharadas de queso crema o crema agria o mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '160 gramos de pollo desmechado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (50 gramos) lonjas o lonjas de jamón serrano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 gramos de rama en apio finamente picado (0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de lechuga, 2 hojas grandes (1,74 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de tomate, picado en rodajas (1,56 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de aguacate picado a la Juliana (8,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o Manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con mantequilla pones sofreír el apio y salpimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando este doradito le agregas el queso crema, revuelves por 1 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y agregas el pollo y rociamos con algo mas de pimiento, revuelves, tapas, apagas y dejas aparte',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguido en un tazón pones 1 huevo, 1 cucharada de queso parmesano, espolvorear con pimiento y bates',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones otro sartén redondo y amplio, le agregas un poco de mantequilla y echas el primer huevo batido',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Este debe quedar bien esparcido en el sartén cuando este doradito lo volteas con mucho cuidado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez volteada le agregas el queso, 1 hoja de lechuga, dos rodajas de tomate, media porción del pollo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y empiezas a cerrar el burrito, si deseas le puedes poner palitos para evitar que se abra',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Repites esta preparación con el otro huevo y los ingredientes',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves acompañado de aguacate',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'El aguacate lo rocías con aceite de oliva y sal pimientas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    Video::create([
        'iframe' => '<iframe src="https://player.vimeo.com/video/588463539" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
        'videoable_id' => $recipe->id,
        'videoable_type' => 'App\Models\Recipe',
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (258, '100', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Salpicón',
        'slug' => 'salpicon',
        'indice'=> 1,
        'carbs' => 2.7,
        'time' => 15,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/salpicon.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '60 gramos de champiñones en láminas (1,98 gr. cH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1(3 gramos) diente de ajo finamente picado (0,72 gr. cH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevos cocidos partidos en rodajas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (25 gramos) lonchas o lonjas o tiras de tocineta o Bacon finamente picada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal pimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un sartén a fuego bajo con mantequilla sofreír el ajo por 2 minutos o hasta que esté doradito',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregas los champiñones, el tocino, sal pimentas y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Dejas por 5 minutos más apagas y tapas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves en un plato pando los champiñones y el tocino',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregas encima las rodajas de huevo espolvoreas con perejil',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves de inmediato, pero antes agregas un chorrito de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (259, '100', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Chorihuevo',
        'slug' => 'chorihuevo',
        'indice'=> 1,
        'carbs' => 0.35,
        'time' => 10,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/chorihuevo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '60 gramos de pernil de pollo desmechado pre cocido',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo cocido partido en dos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 chorizo español partido en rodajas (15 gramos) o 1 lonja de tocino (25 gramos) finamente picado y ya sofrito',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de albahaca',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 gramos de cebollín o cebolla larga finamente picado (0,35 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada (10 gramos) de crema agria o mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón ponemos el pollo, albahaca, cebollín salpimentamos y revolvemos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Seguido agregamos la mayonesa o crema agria, un chorrito de aceite, revolvemos y dejamos conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un plato panto ponemos el huevo, le agregamos el pollo esparcido',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Salpimentamos una vez más y agregamos encima el chorizo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y antes de servir le róseas un poco más de aceite',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (260, '101', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta

    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Tritakos',
        'slug' => 'tritakos',
        'indice'=> 1,
        'carbs' => 9.44,
        'time' => 25,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/tritakos.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '4 (40 gramos) de queso crema o crema agria o combinación de las dos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de pollo desmechado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos de cerdo picado en trozos ya listo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de chicharrón de cerdo picadito en trozos pequeños ya listos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 huevos duros de codorniz (o 1 huevo duro de gallina picado en trocitos)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 hoja grande y entera de repollo morado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 hojas (20 gramos) de cogollos europeos (o 1 de lechuga grande 20 gramos) (0,3 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salsa de tomate con albahaca (1 tomate entero de no más de 60 gramos, 1 cucharadita de albahaca finamente picada (2,34 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 taco de queso parmesano',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Pones a hervir agua, cuando ya esté el agua bien caliente',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregas el tomate entero y dejas que ablande la cáscara',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando veas que esta se desprende',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'La retiras totalmente y sacas el tomate de la olla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón pones el tomate, lo picas en varios trozos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas la albahaca, sal pimientos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y le pones una Buena cantidad de aceite de oliva y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Lista tu salsa (esta la puedes utilizar en diferentes comidas, snack con quesos o base para pizza)',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    Video::create([
        'iframe' => '<iframe src="https://player.vimeo.com/video/588467224" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
        'videoable_id' => $recipe->id,
        'videoable_type' => 'App\Models\Recipe',
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (261, '101', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Nuggets de salmón',
        'slug' => 'nuggets-de-salmon',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 25,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/nuggets-de-salmon.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '80 gramos de lomo de salmón partido en trozos pequeños precocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 (30 gramos) 30 gramos de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de salsa de chimichurri casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);



    $x = 0;
    Instruction::create([
        'name' => 'En otro tazón, pones el huevo y bates',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otro tazón, pones el queso parmesano',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Introducir uno a uno de los trozos de salmón en el huevo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después pasarlos por el tazón del queso parmesano, repetir los pasos para que estén bien cubiertos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una sartén a fuego medio con mantequilla freír los Nuggets de salmón por 5 minutos por lado y lado hasta que doren o estén bien hechos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servir de inmediato con el chimichurri',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y bañas con un poco de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (262, '101', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta



    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Wraps rapidisimo',
        'slug' => 'wraps-rapidisimo',
        'indice'=> 1,
        'carbs' => 0.58,
        'time' => 10,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/wraps-rapidisimo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '1 hojas grande de lechuga de 20 gramos (0,58 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos duros partidos en trocitos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (10 gramos) cucharada de queso cheddar derretido o el queso de tu gusto preferiblemente graso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-Virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un plato pando ponemos la lechuga abierta le rociamos aceite de oliva y salpimentamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregamos el queso derretido bien esparcido',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Encima añadimos los huevos, espolvoreamos con el perejil salpimienta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y le agregamos una vez más un chorrito de aceite de oliva extra-virgen aromatizado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servimos de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (263, '102', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Colopalitos a la broaster',
        'slug' => 'colopalitos-a-la-broaster',
        'indice'=> 1,
        'carbs' => 9.87,
        'time' => 25,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/colopalitos-a-la-broaster.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '220 gramos de colombinas de pollo con piel ya precocidas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '4 cucharadas (40 gramos) de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '6 espárragos (100 gramos) partidos a la mitad (3,9 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (4 gramos) diente de ajo finamente picado (0,98 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes para la ensalada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de acelgas partidas en trozos (2,25 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de lechuga romana partidas en trozos (1,74 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '25 gramos de rúcala partida en trozos (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de vinagre de cidra de manzana',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un sartén con mantequilla y a fuego bajo, ponemos a so fritar el ajo por dos minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añadimos los espárragos y dejamos que se sofríen por 3 minutos o hasta que estén al dente, apagamos y conservamos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'A parte en un tazón ponemos los huevos y revolvemos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => ' En   otro tazón el queso parmesano',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En el mismo sarten donde so fritamos los espárragos, agregamos una buena cantidad de mantequilla y ponemos a fuego bajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y empezamos a preparar las colombinas para llevar al sarten',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Llevamos una colombina por el huevo, seguido la pasamos por el queso y repetimos el proceso para que quede bien apanado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y ponemos en el sarten que tenemos ya caliente',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Así con cada una de las colombinas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'De igual manera apanas los espárragos, y los ponemos el mismo sarten',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y vertimos el queso y el huevo que sobra encima de los espárragos y giramos para que se complemente',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Si ves que necesitas mas mantequilla o con lo que estés fritando le agregas para evitar que se quemen',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listo emplatas y sirves con una rica ensalada de hojas verdes y frescas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación para la ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pones todos los vegetales en un tazón',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas el vinagre, salpimientas y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Bañas la ensalada con una buena cantidad de aceite de oliva, otra vez salpimientas y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);


    Video::create([
        'iframe' => '<iframe src="https://player.vimeo.com/video/588472930" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
        'videoable_id' => $recipe->id,
        'videoable_type' => 'App\Models\Recipe',
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (264, '102', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Totopos a la quesiu',
        'slug' => 'totopos-a-la-quesiu',
        'indice'=> 1,
        'carbs' => 2.64,
        'time' => 20,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/totopos-a-la-quesiu.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '3 (30 gramos) queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '35 gramos de queso cabra o el de tu gusto, pero preferiblemente graso partido en cuadritos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '3 cucharadas de tomate con albahaca casero (2, 64 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un sartén redondo y pequeño colocas el queso parmesano bien esparcido a fuego bajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté burbujeando le das vuelta y dejas que dore',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Lo retiras y de inmediato empiezas a cortar la tortilla en triangulitos debe ser muy rápido antes que el queso endurezca',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves los cubitos de queso y róseas con un poquito de salsa, una buena cantidad de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y el resto de salsa la sirves para acompañar con los totopos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (265, '102', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Huevocon',
        'slug' => 'huevocon',
        'indice'=> 1,
        'carbs' => 6.45,
        'time' => 15,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/huevocon.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '70 gramos de aguacate, que este sea pequeño para que cuando se parta quede la mitad completa, y con la pepa (5,95 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 aceitunas finamente picadas (0,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo cocido',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada de queso crema o crema agria o mayonesa casera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de perejil finamente picado',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón ponemos el huevo y machacamos con un tenedor',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregamos un chorrito de aceite de oliva, salpimentamos y revolvemos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Adicionamos 1 cucharada de queso crema y revolvemos una vez más',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Empezamos a rellenar el aguacate con cuidado para evitar que se fracture',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregamos encima las aceitunas, espolvoreamos con el perejil',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y lo bañamos con un chorrito de aceite de oliva y salpimentamos una vez mas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servimos de inmediato',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (266, '103', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Lomos loketas',
        'slug' => 'lomos-loketas',
        'indice'=> 1,
        'carbs' => 7.81,
        'time' => 25,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/lomos-loketas.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '220 gramos de lomo de res (cada lomo de 110 gramos promedio) previamente sazonados al gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 huevos de codorniz',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (4 gramos) diente de ajo finamente picado (0,98 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Media cucharadita de laurel y tomillo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 cucharadas de queso crema o crema agria',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes para la  ensalada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '15 gramos rábano picado a la juliana (0,51 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 gramos de cebolla picado a la juliana ( 0,93 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '60 gramos de lechuga picada (1,74 gramos de carbohidrato)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de champiñones crudos picados (1,65 gramos de carbohidrato)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '10 aceitunas  partidas a la mitad (1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '30 ml de zumo de limón ( 1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Sal y pimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Precalentamos el horno a 180oC',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una refractaria previa con mantequilla ponemos los lomos al horno por 10 minutos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Mientras que los lomos se están haciendo, en un sartén a fuego bajo con mantequilla',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Agregamos el ajo, las especies, la crema agria revolvemos por 2 minutos o hasta que la crema este liquida',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añadimos los huevos revolvemos por unos segundos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Apagamos, tapamos y dejamos conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Volvemos al horno revisamos que estén listos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un plato pando ponemos los dos lomos y bañamos con la salsa con huevo que tenemos conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servimos de inmediato con una rica ensalada fresca',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación para la ensalada',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón agregas los vegetales crudos lechuga, champiñones, rábano, aceitunas, cebolla, salpimientas y  revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Añades el zumo de limón, un buen chorro de aceite de oliva, salpimientas una vez más y revuelves',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    Video::create([
        'iframe' => '<iframe src="https://player.vimeo.com/video/588477818" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
        'videoable_id' => $recipe->id,
        'videoable_type' => 'App\Models\Recipe',
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (267, '103', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Regalito sorpreketo',
        'slug' => 'regalito-sorpreketo',
        'indice'=> 1,
        'carbs' => 0.5,
        'time' => 10,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/regalito-sorpreketo.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '40 gramos de pernil de pollo desmechado pre cocido',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo cocido partido en dos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharadita de perejil',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '5 aceitunas finamente picadas (0,5 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 cucharada (10 gramos) de crema agria o mayonesa cacera',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizada',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'salpimienta',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En un tazón ponemos el pollo, perejil, mayonesa o crema agria, salpimentamos y revolvemos y dejamos conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén redondo y pequeño colocas el queso parmesano bien esparcido a fuego bajo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Cuando esté burbujeando le agregas el pollo que tienes conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y de inmediato empiezas cerrar el queso con unas pinzas en forma de regalito, ten cuidado no quemarte',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Te puedes ayudar insertando palitos para que de la forma de regalo.  Y las puntas de cada palito le puedes poner parte de las aceitunas y el resto encima',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Retiras y dejas en el plato que vas a servir',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En este mismo plato pones los huevos, le espolvoreas algo de perejil, salpimientas y un chorrito de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (268, '103', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Tradicionalmente keto',
        'slug' => 'tradicionalmente-keto',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 15,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/tradicionalmente-keto.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '2 huevos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '35 gramos de queso manchego',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 (25 gramos) de tocinetas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Salpimienta',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'Clásico de los clásicos desayunitos, para todos los gustos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Pueden ser los huevos revueltos, ya sea con el queso y la tocineta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'huevos fritos al gusto, con el queso derretido encima y la tocineta sofrita aparte',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'huevos en tortilla con pedacitos de queso y tocineta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En fin, la decisión esta en tus manos, pero eso si siempre hechos en mantequilla o manteca de cerdo o aceite de coco',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (269, '104', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Hambur con keto patatas',
        'slug' => 'hambur-con-keto-patatas',
        'indice'=> 1,
        'carbs' => 16.31,
        'time' => 30,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/hambur-con-keto-patatas.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '200 gramos de carne molida de res adobada al gusto',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => ' 2 lonjas o lonchas (40 gramos) queso holandés o el que tengas preferiblemente graso',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 lonjas o lonchas (25 gramos) de tocino o panceta, preferiblemente en tiras',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas crema agria',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '80 gramos de aguacate picada en cuadritos (6,96 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '50 gramos de tomate en rodajas en rodajas (1,95 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '40 gramos de cebolla en rodajas (3,72 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2(20 gramos) hojas de lechuga romana enteras (0,58 gr. CH)',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Ingredientes keto patatas',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '100 gramos coliflor previamente listo (3,1 gr. CH)',
        'recipe_id' => $recipe->id
    ]);


    $x = 0;
    Instruction::create([
        'name' => 'Preparación hamburguesa',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Con anterioridad mezclas la carne y la haces en forma de hamburguesa y dejas conservando',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén pones a fritar el huevo según tu gusto',
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
        'name' => 'Seguido le agregas la cebolla y el tomate que tenias en el sartén y una lonja de queso adicional',
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
        'name' => 'Encima la hamburguesa que tienes lista, le agregas el tocino, el huevo',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Le agregas el aguacate, salpimientas y una vez mas le agregas crema agria',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Sirves con las patatas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Preparación keto patatas',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Se pone la coliflor entera en agua hirviendo con sal, y se deja por 10 minutos o hasta que ablande, se retira se seca súper bien y se machaca',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un tazón pones la masa de coliflor, le agregas el huevo, queso y pimienta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Revuelves muy bien hasta que todo se complemente y quede una masa más compacta',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Empiezas a hacer bolitas pequeñas que después aplanas con la mano para que den forma redonda',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En un sartén con suficiente mantequilla o aceite de coco pones a freír tus patatas por lado y lado',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Puede que con esta cantidad salgan varias porciones según el tamaño',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Una vez listas sirves con tu rica hambur',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    Video::create([
        'iframe' => '<iframe src="https://player.vimeo.com/video/588482263" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
        'videoable_id' => $recipe->id,
        'videoable_type' => 'App\Models\Recipe',
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (270, '104', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


    // Inicio Receta
    $recipe = Recipe::create([
        'name' => 'Polluelos apanados',
        'slug' => 'polluelos-apanados',
        'indice'=> 1,
        'carbs' => 0,
        'time' => 10,
        'type' => 1,
    ]);

    $image = Image::create([
        'url' => 'recipes/polluelos-apanados.jpg',
        'imageable_id' => $recipe->id,
        'imageable_type' => 'App\Models\Recipe',
    ]);

    Ingredient::create([
        'name' => '70 gramos de pernil de pollo partido en trozos pequeños pre cocidos',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) 30 gramos de queso parmesano',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '1 huevo',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Mantequilla de vaca 100% de pastoreo o manteca de cerdo o aceite de coco',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => '2 (20 gramos) cucharadas de queso cheddar derretido',
        'recipe_id' => $recipe->id
    ]);
    Ingredient::create([
        'name' => 'Aceite de oliva extra-virgen natural o aromatizado',
        'recipe_id' => $recipe->id
    ]);

    $x = 0;
    Instruction::create([
        'name' => 'En otro tazón, pones el huevo y bates',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En otro tazón, pones el queso parmesano',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Introducir uno a uno de los trozos de pollo en el huevo,',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Después pasarlos por el tazón del queso parmesano, repetir los pasos para que estén bien cubiertos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'En una sartén a fuego medio con mantequilla freír los polluelos por 5 minutos por lado y lado hasta que doren o estén bien hechos',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Servir de inmediato el queso derretido',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);
    Instruction::create([
        'name' => 'Y bañas con un poco de aceite de oliva',
        'step' => $x = $x + 1,
        'recipe_id' => $recipe->id,
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (271, '104', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
    // Fin Receta


// Inicio Receta
$recipe = Recipe::create([
    'name' => 'Consomé de huevo',
    'slug' => 'consome-de-huevo',
    'indice'=> 1,
    'carbs' => 2.1,
    'time' => 10,
    'type' => 1,
]);

$image = Image::create([
    'url' => 'recipes/consome-de-huevo.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '2(700ml) tazas de consomé de pollo tradicional',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 huevos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharada de cilantro finamente picado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1 cucharada de perejil finamente picado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '30 gramos de cebollín o cebolla larga finamente picada (2,1 gr. CH)',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Ponemos en una olla a fuego bajo el consomé de pollo con media cucharadita de cilantro, 15 gramos de cebollín, guardamos los otros 15 gramos y el perejil',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'A parte en un tazón ponemos uno de los dos huevos salpimentamos al gusto y batimos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Cuando el consomé está calentando, pero no hirviendo agregamos los huevos que tenemos el tazón y empezamos a revolverlos dentro del consomé',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Seguimos revolviendo por lo menos por 10 minutos hasta que el huevo quede desechos y quede como una telita blanca',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Cuando empiece a hervir, reventamos el otro huevo dentro del caldo este si debe ir entero',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Subimos el fuego para que rápidamente el huevo se cocine y quede entero dejamos que hierva',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Con una cuchara mueves un poquito el huevo completo para evitar que se pegue, apagamos y tapamos por 3 minutos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Servimos de inmediato agregándole por encima el cilantro y cebollín que tenemos conservando.',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(272, '105', $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");
// Fin Receta


// Inicio Receta
$recipe = Recipe::create([
    'name' => 'Tazón',
    'slug' => 'tazon',
    'indice'=> 1,
    'carbs' => 12.74,
    'time' => 20,
    'type' => 1,
]);

$image = Image::create([
    'url' => 'recipes/tazon.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '60 gramos de lechuga romana partida en trozos (1,74 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de lechuga morada partida en trozos (1,16 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '60 gramos de rúcula partida en trozos (2,4 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '60 gramos de aguacate picado en trocitos (5,1 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '100 gramos de pollo desmechado ya listo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '100 gramos de lomo de cerdo o res partido en trocitos ya listo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '3 huevos de codorniz ya listos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '40 gramos de chicharrón natural partido en trocitos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '3 (30 gramos) queso crema o crema agria o de las dos',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Salsa de tomate con albahaca (1 tomate entero de no mas de 60 gramos, 1 cucharadita de albahaca finamente picada (2,34 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra-virgen natural o aromatizado',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Salpimienta',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'Ponemos en un tazón, la mitad de cada uno de los ingredientes salpimentamos, y revolvemos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregamos la otra mitad de los ingredientes, y esta vez le agregamos una buena cantidad de aceite de oliva',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Revolvemos y servimos de inmediato',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

Video::create([
    'iframe' => '<iframe src="https://player.vimeo.com/video/588488166" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
    'videoable_id' => $recipe->id,
    'videoable_type' => 'App\Models\Recipe',
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(273, '105', $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");
// Fin Receta


// Inicio Receta
$recipe = Recipe::create([
    'name' => 'Sencillamente champiñones',
    'slug' => 'sencillamente-champinones',
    'indice'=> 1,
    'carbs' => 2.22,
    'time' => 10,
    'type' => 1,
]);

$image = Image::create([
    'url' => 'recipes/sencillamente-champinones.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
]);

Ingredient::create([
    'name' => '60 gramos de champiñones enteros y limpios (1,98 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '1(1 gramos) ajo finamente picado (0,24 gr. CH)',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => '2 (50 gramos) lonjas o lonchas de tocino o tocineta finamente picada',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Mantequilla de vaca 100% de pastoreo',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Sal pimienta',
    'recipe_id' => $recipe->id
]);
Ingredient::create([
    'name' => 'Aceite de oliva extra virgen natural o aromatizado',
    'recipe_id' => $recipe->id
]);

$x = 0;
Instruction::create([
    'name' => 'En una olla hirviendo ponemos los champiñones enteros para que se cocinen por no más de dos minutos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Ponemos en un sartén con 1 cucharada de mantequilla, a sofreír el ajo por 1 minuto',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Agregamos la tocineta, salpimentamos y revolvemos',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Pasado dos minutos agregamos los champiñones y revolvemos para que todo se penetre',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Dejamos sofreír por dos minutos más o hasta que la tocineta esté bien crujiente',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);
Instruction::create([
    'name' => 'Servimos de inmediato bañados aceite de oliva',
    'step' => $x = $x + 1,
    'recipe_id' => $recipe->id,
]);

DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
(274, '105', $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");
// Fin Receta
*/
});
