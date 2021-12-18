<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\CursoGratis;
use App\Http\Livewire\Masterclass;
use App\Http\Livewire\Reto;
use App\Http\Livewire\UserRecipe;
use App\Mail\ApprovedPurchaseReto;
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
use Illuminate\Support\Facades\Mail;

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
    return view('no-disponible');
    //return redirect()->route('reto.register', ['reto'=>'navidad']);

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
    //return view('no-disponible');
    $plan = Plan::find(15);
    return redirect()->route('payment.pay', ['plan'=>$plan]);
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

Route::get('x/days/', function(){
    $days = Day::all();
    print_r($days);
});


Route::get('x/clients', function () {
    $users = User::all();
    foreach($users as $user){
        echo $user->email;
        echo"<br/>";
    }
});

Route::get('x/clients/navidad', function () {
    $users = User::all();
    foreach($users as $user){
        $is_already_subscribed  = Subscription::where('user_id', $user->id)->where('plan_id', 17)->first();
        if($is_already_subscribed){
            echo $user->email;
            echo"<br/>";
        }
    }
});

Route::get('x/plans/', function(){
    $plans = Plan::all();
    foreach ($plans as $plan) {
        echo "======</br>";
        echo "Plan ID: ". $plan->id ."</br>";
        echo $plan->name."</br>";
        echo $plan->slug ."</br>";
        echo "Precio ID ". $plan->price_id ." - ". $plan->price->name."</br>";
        if($plan->discount_id){
            echo "******************"."</br>";
            echo "Descuento ID ". $plan->discount_id."</br>";
            echo $plan->discount->name."</br>";
            echo "Valor US$ ". $plan->discount->value."</br>";
            echo "Válido hasta ". $plan->discount->expires_at."</br>";
            echo "******************"."</br>";
        }
        echo "======</br></br>";

    }
    //$fase_week = Fase::find(2);
    //dd($fase_week->clients());
});

Route::get('x/prices/', function(){
    $prices = Price::all();
    foreach ($prices as $price) {
        echo "======</br>";
        echo "Plan ID: ". $price->id ."</br>";
        echo $price->name."</br>";
        echo $price->value ."</br>";
        echo "======</br></br>";
    }
});

Route::get('x/discounts/', function(){
    $discounts = Discount::all();
    foreach ($discounts as $discount) {
        echo "======</br>";
        echo "Plan ID: ". $discount->id ."</br>";
        echo $discount->name."</br>";
        echo $discount->type ."</br>";
        echo "Valor US$ ".$discount->value ."</br>";
        echo "Válido hasta ".$discount->expires_at ."</br>";
        echo "======</br></br>";
    }
});

Route::get('x/sql/', function(){
    DB::insert("UPDATE users SET email = LOWER(email)");
});

Route::get('x/query', function(){
/*
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
*/
////
/*
    $recipe = Recipe::create([
    'name' => 'Canastilla de codorniz',
    'slug' => 'canastilla-de-codorniz',
    'indice'=> 1,
    'carbs' => 0,
    'time' => 10,
    'type' => 1,
    ]);
    $image = Image::create([
    'url' => 'recipes/d403.jpg',
    'imageable_id' => $recipe->id,
    'imageable_type' => 'App\Models\Recipe',
    ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (299, 128, 283, '3', CURRENT_TIMESTAMP, NULL)");
*/

$plan = Plan::find(15);
$plan->name = "Oferta Reto - Método DKP 4 Fases";
$plan->slug = "oferta-reto-4-fases";
$plan->save();
$discount = Discount::find(10);
$discount->name = "Oferta Reto";
$discount->save();

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

    $users = User::where('email','!=','null')->skip($skip)->take(400)->get();

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

Route::get('x/users/reto/add/{email}', function($email){

    $user                   = User::where('email',$email)->first();
    $plan                   = Plan::find(17);
    $is_already_subscribed  = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
    $previous_plan_navidad  = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(1, 2, 7, 8, 9, 10, 15, 16))->first();
    $keto_navidad           = Fase::find(8);

    if(!$is_already_subscribed){
        if(!$previous_plan_navidad){
            $suscription_plan           = new Subscription();
            $suscription_plan->user_id  = $user->id;
            $suscription_plan->plan_id  = $plan->id;
            $suscription_plan->save();
        }
        if(!$keto_navidad->clients->contains($user->id)){
            $keto_navidad->clients()->attach($user->id);
        }

        $mail = new ApprovedPurchaseReto($plan, $user);
        Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);

        echo "---------<br>";
        echo "Correo enviado a ". $user->name." - ".$user->email."<br/>";
        echo "*********<br>";

    }
});
