<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\CursoGratis;
use App\Http\Livewire\Masterclass;
use App\Http\Livewire\Reto;
use App\Http\Livewire\UserRecipe;
use App\Models\Day;
use App\Models\Discount;
use App\Models\Fase;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Plan;
use App\Models\Price;
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

Route::get('masterclass/{masterclass}/register', Masterclass::class)->name('masterclass.register');
Route::get('masterclass/{masterclass}/replay', [Masterclass::class, 'replay'])->name('masterclass.replay');
Route::get('masterclass/{masterclass}/thanks', [Masterclass::class, 'thanks'])->name('masterclass.thanks');

Route::get('curso-keto', CursoGratis::class)->name('cursos.keto.register');
Route::get('curso-keto/go',[CursoGratis::class,'go'])->name('cursos.keto.go');
Route::get('curso-keto/thanks', [CursoGratis::class,'thanks'])->name('cursos.keto.gracias');


Route::get('privado', function () {
    return view('no-disponible');
    $plan = Plan::find(14);
    return view('en-privado', ['plan'=>$plan]);
});

Route::get('x/mail', function () {
    $plan = Plan::find(17);
    $user = User::find(36);

    return view('mail.approved-purchase-reto', ['plan'=>$plan, 'user'=>$user]);
});





Route::get('/dieta', function () {
    return redirect()->route('plan.index');
})->name('redirect.dieta');

Route::get('reto/{reto}/register', Reto::class)->name('reto.register');

Route::get('/navidad', function () {
    return redirect()->route('reto.register', ['reto'=>'7-dias']);
    //return view('no-disponible');
})->name('reto.navidad');

Route::get('/selecto', function () {
    $plan = Plan::find(10);
    //return redirect()->route('payment.pay', ['plan'=>$plan]);
    return view('no-disponible');
})->name('selecto');

Route::get('/10', function () {
    return redirect('https://biz.payulatam.com/L0bdc052728EC33');
});

Route::get('/67', function () {
    return view('no-disponible');
    //$plan = Plan::find(1);
    //return redirect()->route('payment.pay', ['plan'=>$plan]);
})->name('reto.oferta');


Route::get('/bf', function () {
    return view('no-disponible');
    $plan = Plan::find(15);
    $plan2 = Plan::find(16);
    return view('black-friday', ['plan'=>$plan, 'plan2'=>$plan2]);
})->name('reto.blackFriday');

Route::get('/lunes', function () {
    return view('no-disponible');
    $plan = Plan::find(15);
    $plan2 = Plan::find(16);
    return view('black-friday', ['plan'=>$plan, 'plan2'=>$plan2]);
})->name('reto.cyberLunes');




Route::get('/reto4', function () {
    return redirect()->route('masterclass.register', ['masterclass'=>'reto-4']);
    //return view('no-disponible');
})->name('reto4');


Route::get('/110', function () {
    return view('no-disponible');
});

Route::get('x/plan/{user}', function($user){
    $user = User::where('email',$user)->first();
    if($user){
        return array($user->subscriptions);
    }else{
        return "Usuario no registrado";
    }
});

Route::get('x/recipes/', function(){
    $recipes = Recipe::all();
    print_r($recipes);
});

Route::get('x/clients', function () {
    $users = User::all();
    foreach($users as $user){
        echo $user->email;
        echo"<br/>";
    }
});

Route::get('x/plans/', function(){
    $plans = Plan::all();
    dd($plans);
    //$fase_week = Fase::find(2);
    //dd($fase_week->clients());
});

Route::get('x/prices/', function(){
    $prices = Price::all();
    dd($prices);
});

Route::get('x/discounts/', function(){
    $discounts = Discount::all();
    dd($discounts);
});

Route::get('x/sql/', function(){
    DB::insert("UPDATE users SET email = LOWER(email)");
});

Route::get('x/query', function(){

    $plan = Plan::create([
        'name' => 'Reto Keto Navidad',
        'slug' => 'reto-navidad',
        'price_id' => 14
    ]);

    $fase = Fase::create([
        'name' => 'Reto 7 Días Navidad',
        'sub_name' => 'Reto <span class="text-red-700">Keto</span> Navidad',
        'descripcion' => '',
        'slug' => 'keto-navidad',
    ]);

    //$row = DB::table('day_recipe')->where('id', '=', '36')->update(['meal' => 1]);
    //DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (4, '3', '1', CURRENT_TIMESTAMP, NULL)");

    $day = Day::create([
        'day' => 1,
        'fase_id' => $fase->id,
    ]);
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (79, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (79, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    $day = Day::create([
        'day' => 2,
        'fase_id' => $fase->id,
    ]);
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (80, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (80, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    $day = Day::create([
        'day' => 3,
        'fase_id' => $fase->id,
    ]);
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (81, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (81, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    $day = Day::create([
        'day' => 4,
        'fase_id' => $fase->id,
    ]);
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (82, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (82, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    $day = Day::create([
        'day' => 5,
        'fase_id' => $fase->id,
    ]);
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (83, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (83, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    $day = Day::create([
        'day' => 6,
        'fase_id' => $fase->id,
    ]);
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (84, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (84, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    $day = Day::create([
        'day' => 7,
        'fase_id' => $fase->id,
    ]);
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    (85, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    (85, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    (12, 'Lista de Alimentos Keto Navidad', 'files/pdf/lista-de-alimentos-reto-navidad.pdf', $fase->id, 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL),
    (13, 'Secretos Keto Navidad', 'files/pdf/secretos-fase-0-dkp.pdf', $fase->id, 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    (12, $fase->id, '1', 'files/pdf/lista-de-alimentos-reto-navidad.pdf', CURRENT_TIMESTAMP, NULL)");


    /**
        $recipe = Recipe::create([
            'name' => 'Picañones',
            'slug' => 'picanones',
            'indice'=> 1,
            'carbs' => 0,
            'time' => 15,
            'type' => 1,
        ]);

        $image = Image::create([
            'url' => 'recipes/aguaton.jpg',
            'imageable_id' => $recipe->id,
            'imageable_type' => 'App\Models\Recipe',
        ]);

        $video = Video::create([
            'iframe' => '<iframe src="https://player.vimeo.com/video/638693117" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
            'videoable_id' => $recipe->id,
            'videoable_type' => 'App\Models\Recipe',
        ]);

        DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
        (279, $day->id, $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");
    **/

});

Route::get('x/whatsapp/', function(){

    $client = new \GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/x-www-form-urlencoded', 'apikey'=>'b07192ca25814406c42867e0376518d0']]);

    $response = $client->get('https://api.gupshup.io/sm/api/v1/users/MYCXAPP');

    echo ($response->getBody());
    return;
    $data = array(
    'channel' => 'whatsapp',
    'source' => '917834811114',
    'destination' => '573155217037',
    'src.name'=> 'MYCXAPP',
    'message' => '{
        "type":"quick_reply",
        "msgid":"qr1",
        "content":{ "type":"text", "header":"Bienvenido al area comercial del doctor X", "text":"Acontinuación encontrarás una lista de opciones", "caption":"Por favor elije una y con mucho gusto te atenderemos" },
        "options":[ { "type":"text", "title":"Cotizar Cirugia" }, { "type":"text", "title":"Solicitar Consulta" }, { "type":"text", "title":"Otro" } ]}'
    );

    $response = $client->post('https://api.gupshup.io/sm/api/v1/msg',[
        'body'  => http_build_query($data),
    ]);

    dd($response);
});

Route::get('x/users/{skip?}', function($skip = 0){

    $users = User::where('email','!=','null')->skip($skip)->take(500)->get();

    if($skip == 0){
        $i=1;
    }else{
        $i = $skip;
    }

    foreach($users as $user){

        if ($user->subscription) {
            echo "---------<br>";

            echo $i++ ." User id ". $user->id."<br/>";
            echo $user->name." - ".$user->email."<br/>";
            foreach ($user->subscriptions as $subscription) {
                if($subscription){
                    if($subscription->plan->id == 4 || $subscription->plan->id == 12 || $subscription->plan->id == 13 ){

                        if(\Carbon\Carbon::createFromTimeStamp(strtotime($subscription->expires_at))->gt(\Carbon\Carbon::now())){
                            $whatsapp = "Expira en ".\Carbon\Carbon::createFromTimeStamp(strtotime($subscription->expires_at))->diffForHumans();
                        }else{
                            $whatsapp = "Expiró";
                        }

                        echo "Plan id ".$subscription->plan->id." ".$subscription->plan->name." ".$whatsapp."<br/>";

                    }else{

                        echo "Plan id ".$subscription->plan->id." ".$subscription->plan->name."<br/>";
                    }
                }
            }
            echo "---------<br>";
            echo "*********<br>";
        }
    }

});

