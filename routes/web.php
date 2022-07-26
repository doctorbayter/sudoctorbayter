<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Livewire\CursoGratis;
use App\Http\Livewire\Masterclass;
use App\Http\Livewire\Reto;
use App\Http\Livewire\UserRecipe;
use App\Mail\ApprovedPurchase;
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
Route::get('/thf', [HomeController::class, 'thf'])->name('thf');
Route::get('/revolucion', [HomeController::class, 'event'])->name('event');
Route::get('/revolucion/qr/{email}', [HomeController::class, 'eventQr'])->name('event.qr');
Route::get('/revolucion/ticket/qr', [HomeController::class, 'eventTicketQr'])->name('event.ticketQr');
Route::get('/revolucion/ticket', [HomeController::class, 'eventTicket'])->name('event.ticket');
Route::get('/revolucion/certificado/', [HomeController::class, 'eventPdf'])->name('event.certificado');
Route::get('/revolucion/certificado/pdf', [PdfController::class, 'generatePdf'])->name('event.pdf');

Route::get('/programas', [HomeController::class, 'programas'])->name('programas');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/post/que-comer-y-que-evitar-en-una-dieta-cetogenica', [HomeController::class, 'blog_uno'])->name('blog.uno');
Route::get('/blog/post/5-beneficios-que-no-conocias-de-la-dieta-cetogenica', [HomeController::class, 'blog_dos'])->name('blog.dos');
Route::get('/blog/post/como-saber-si-estas-en-cetosis', [HomeController::class, 'blog_tres'])->name('blog.tres');
Route::get('/recursos', [HomeController::class, 'recursos'])->name('recursos');
Route::get('/cita', [HomeController::class, 'cita'])->name('cita');
Route::get('/what', [HomeController::class, 'what'])->name('what');
Route::get('/recipe/{recipe}', UserRecipe::class)->name('recipe');

Route::get('libro/', function(){
    return redirect()->away("https://www.amazon.com/-/es/dp/B09V1PD9VC/ref=sr_1_1?crid=2KFPRGHJW9WD&keywords=catastrofes+en+cirugia+plastica&qid=1646685263&s=digital-text&sprefix=%2Cdigital-text%2C161&sr=1-1");
});

Route::get('pareja/', function(){
    return redirect()->away("https://biz.payulatam.com/L0bdc050469E638");
});

Route::get('/privacidad', function(){
    return view('terms');
} )->name('privacidad');

Route::get('masterclass/{masterclass}/register', Masterclass::class)->name('masterclass.register');
Route::get('masterclass/{masterclass}/replay', [Masterclass::class, 'replay'])->name('masterclass.replay');
Route::get('masterclass/{masterclass}/thanks', [Masterclass::class, 'thanks'])->name('masterclass.thanks');
Route::get('masterclass/{masterclass}/dia-{day}', [Masterclass::class, 'day'])->name('masterclass.day');

Route::get('curso-keto', CursoGratis::class)->name('cursos.keto.register');
Route::get('curso-keto/go',[CursoGratis::class,'go'])->name('cursos.keto.go');
Route::get('curso-keto/thanks', [CursoGratis::class,'thanks'])->name('cursos.keto.gracias');

Route::get('privado', function () {
    return view('no-disponible');
    $plan = Plan::find(14);
    return view('en-privado', ['plan'=>$plan]);
});

Route::get('x/qr/{email}', function ($email) {
    echo $qr = base64_encode($email);
});

Route::get('/dieta', function () {
    return redirect()->route('plan.index');
})->name('redirect.dieta');

Route::get('reto/{reto}/register', Reto::class)->name('reto.register');

Route::get('reto/{reto}/repeticion/reunion-{day}', [Reto::class, 'replay'])->name('reto.replay');

Route::get('reto/{reto}/video', [Reto::class, 'video'])->name('reto.video');


Route::get('/regalo', function () {
    return view('no-disponible');
    //$plan = Plan::find(1);
    //return redirect()->route('payment.pay', ['plan'=>$plan, 'sale'=>'regalo']);

})->name('regalo.navidad');

Route::get('/reto5', function () {
    //return view('no-disponible');
    return redirect()->route('reto.register', ['reto'=>'5mer']);
})->name('reto.2022');

Route::get('/selecto', function () {
    $plan = Plan::find(10);
    //return redirect()->route('payment.pay', ['plan'=>$plan]);
    return view('no-disponible');
})->name('selecto');

Route::get('/10', function () {
    return redirect('https://biz.payulatam.com/L0bdc052728EC33');
});

Route::get('/99', function () {
    return view('no-disponible');
    $plan = Plan::find(25);
    return redirect()->route('payment.pay', ['plan'=>$plan]);
})->name('reto.oferta');

Route::get('/67', function () {
    return view('no-disponible');
    $plan = Plan::find(15);

    return redirect()->route('payment.pay', ['plan'=>$plan]);
})->name('reto.oferta');

Route::get('/oferta', function () {
    //return view('no-disponible');
    $promo_plan = Plan::find(32);
    $promo_chat21 = Plan::find(33);
    $promo_chat70 = Plan::find(34);
    $promo_chat140 = Plan::find(35);
    return view('event-offer', ['promo_plan'=>$promo_plan, 'promo_chat21'=>$promo_chat21, 'promo_chat70'=>$promo_chat70, 'promo_chat140'=>$promo_chat140]);
})->name('evento.oferta');

Route::get('/oferta2', [HomeController::class, 'dkp'])->name('revolucion.oferta');

Route::get('/bf', function () {
    return view('no-disponible');
    // $plan = Plan::find(15);
    // $plan2 = Plan::find(16);
    // return view('black-friday', ['plan'=>$plan, 'plan2'=>$plan2]);
})->name('reto.blackFriday');

Route::get('/lunes', function () {
    return view('no-disponible');
    // $plan = Plan::find(15);
    // $plan2 = Plan::find(16);
    // return view('black-friday', ['plan'=>$plan, 'plan2'=>$plan2]);
})->name('reto.cyberLunes');

Route::get('/reto4', function () {
    return redirect()->route('masterclass.register', ['masterclass'=>'reto-4']);
    //return view('no-disponible');
})->name('reto4');

Route::get('/camus', function () {
    //return redirect()->route('masterclass.register', ['masterclass'=>'camus']);
    return view('no-disponible');
})->name('camus');

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

Route::get('x/clients/reto', function () {

    $i = 1;
    $subscriptions = Subscription::whereIn('plan_id', [19])->get();
    foreach($subscriptions as $subscription){
        echo $i." - ". $subscription->user->email;
        echo"<br/>";
        $i += 1;
    }

});

Route::get('x/clients/reto/ac/{skip?}', function($skip = 0){

    $plans = Subscription::where('plan_id', 19)
                            ->skip($skip)->take(250)->get();

    $list_id = 21;

    foreach($plans as $plan){


        $response = Http::withHeaders([
            'Api-Token' => 'c1d483a96b0fd0f622ed137c5679b1d97ebd130b09501ab4e1d384e1a4a64ef6c34ff576'
        ]);

        $getUserByEmail = $response->GET('https://doctorbayter.api-us1.com/api/3/contacts/',[
            "email" => $plan->user->email,
            "orders[email]" => "ASC"
        ]);



        if($getUserByEmail){
            $userData = $getUserByEmail['contacts'];
        }else{
            $userData = null;
        }


        if($userData){
            $userListsLink = $userData[0]['links']['contactLists'];
            $userId = $userData[0]['id'];
        }else{

            $name = trim($plan->user->name);
            $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );

            $addUser = $response->POST('https://doctorbayter.api-us1.com/api/3/contacts',[
                "contact" => [
                    "email" => $plan->user->email,
                    "firstName" => $first_name,
                    "lastName" => $last_name,
                ]
            ]);
            $userListsLink = $addUser['contact']['links']['contactLists'];
            $userId = $addUser['contact']['id'];

        }

        $getUserLists =  $response->GET($userListsLink);
        $userLists = $getUserLists['contactLists'];

        if(count($userLists) > 0) {

            foreach($userLists as $userList ) {
                if($userList['list'] == $list_id){

                    if($userList['status'] == "2") {
                        $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                            "contactList" => [
                                "list" => $list_id,
                                "contact" => $userId,
                                "status" => 1,
                                "sourceid" => 4
                            ]
                        ]);
                    }
                    break;
                }else{
                    $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                        "contactList" => [
                            "list" => $list_id,
                            "contact" => $userId,
                            "status" => 1
                        ]
                    ]);
                }
            }

        }else{
            $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                "contactList" => [
                    "list" => $list_id,
                    "contact" => $userId,
                    "status" => 1
                ]
            ]);
        }
    }

    return;

});

Route::get('x/clients/leads/retos/{skip?}', function($skip = 0){

    /*
    //Prospectos Retos
    $plans = Subscription::whereIn('plan_id', [18, 17, 19])
                            ->whereNotIn('plan_id', [1,2,3,8,9,10,15,16,25,27])
                            ->skip($skip)->take(250)->get();
    list_id = 20;
    */

    /*
    //Planes Premium
    $plans = Subscription::whereIn('plan_id', [1, 15, 25])
                            ->skip($skip)->take(100)->get();
    $list_id = 33;
    */

    /*
    //REVOLUCION VIP PLUS
    $plans = Subscription::whereIn('plan_id', [22])
                            ->skip($skip)->take(10)->get();
    $list_id = 31;
    */

    /*
    //REVOLUCION VIP
    $plans = Subscription::whereIn('plan_id', [21])
                            ->skip($skip)->take(25)->get();
    $list_id = 30;
    */

    //REVOLUCION GENERAL
    $plans = Subscription::whereIn('plan_id', [20,26,28,30])
                            ->skip($skip)->take(25)->get();
    $list_id = 29;

    foreach($plans as $plan){

        if(filter_var($plan->user->email, FILTER_VALIDATE_EMAIL)){

            $response = Http::withHeaders([
                'Api-Token' => 'c1d483a96b0fd0f622ed137c5679b1d97ebd130b09501ab4e1d384e1a4a64ef6c34ff576'
            ]);

            $getUserByEmail = $response->GET('https://doctorbayter.api-us1.com/api/3/contacts/',[
                "email" => $plan->user->email,
                "orders[email]" => "ASC"
            ]);


            $userData = $getUserByEmail['contacts'];

            if($userData){
                    $userListsLink = $userData[0]['links']['contactLists'];
                    $userId = $userData[0]['id'];
                }else{

                    $name = trim($plan->user->name);

                    $addUser = $response->POST('https://doctorbayter.api-us1.com/api/3/contacts',[
                        "contact" => [
                            "email" => $plan->user->email,
                            "firstName" => $name
                        ]
                    ]);

                    $userListsLink = $addUser['contact']['links']['contactLists'];
                    $userId = $addUser['contact']['id'];

                }

                $getUserLists =  $response->GET($userListsLink);
                $userLists = $getUserLists['contactLists'];

                if(count($userLists) > 0) {

                    foreach($userLists as $userList ) {
                        if($userList['list'] == $list_id){

                            if($userList['status'] == "2") {
                                $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                                    "contactList" => [
                                        "list" => $list_id,
                                        "contact" => $userId,
                                        "status" => 1,
                                        "sourceid" => 4
                                    ]
                                ]);
                            }
                            break;
                        }else{
                            $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                                "contactList" => [
                                    "list" => $list_id,
                                    "contact" => $userId,
                                    "status" => 1
                                ]
                            ]);
                        }
                    }

                }else{
                    $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                        "contactList" => [
                            "list" => $list_id,
                            "contact" => $userId,
                            "status" => 1
                        ]
                    ]);
                }

        }
    }
    return;

});

Route::get('x/clients/eg/{month}', function ($month) {

    $plans = Subscription::whereIn('plan_id', [8, 9])
    ->whereMonth('created_at', $month)
    ->get();
    foreach($plans as $plan){
            $date = \Carbon\Carbon::parse($plan->created_at);
            echo $plan->user->email;
            echo "<br/>";
            echo $plan->name;
            echo "<br/>";
            echo "Valor del plan ".$plan->plan->finalPrice. " US$";
            echo "<br/>";
            echo "Fecha de compra ". $date->format('d-m-Y');
            echo "<br/>";
            echo "======</br></br>";
    }
});

Route::get('x/clients/{plan}', function ($plan) {

    switch ($plan) {
        case 'premium':
            $subscriptions = Subscription::whereIn('plan_id', [1, 15, 25])->get();
            break;
        case 'plus':
            $subscriptions = Subscription::whereIn('plan_id', [22])->get();
            break;
        case 'vip':
            $subscriptions = Subscription::whereIn('plan_id', [21])->get();
            break;
        case 'general':
            $subscriptions = Subscription::whereIn('plan_id', [20,26,28,30])->get();
            break;

    }

    echo $subscriptions->count();
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

Route::get('x/fases/', function(){
    $fases = Fase::all();
    foreach ($fases as $fase) {
        echo "======</br>";
        echo "Fase ID: ". $fase->id ."</br>";
        echo $fase->name."</br>";
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

Route::get('x/query', function(){

    //$row = DB::table('day_recipe')->where('id', '=', '36')->update(['meal' => 1]);
    //DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (4, '3', '1', CURRENT_TIMESTAMP, NULL)");



    // $plan = Plan::create([
    //     'name' => 'Plan + Total Oferta Revolución',
    //     'slug' => 'plan-total-oferta-revolucion',
    //     'price_id' => 20
    // ]);

    // $price = Price::create([
    //     'name' => '42 US$',
    //     'value' => 42
    // ]);


});

Route::get('x/query/reto', function(){


    // Plan y Fase del reto

    $plan = Plan::create([
        'name' => '5Mer el reto del ayuno',
        'slug' => '5mer',
        'price_id' => 14
    ]);

    $fase = Fase::create([
        'name' => '5Mer',
        'sub_name' => 'El reto del <span class="text-red-700">Ayuno</span>',
        'descripcion' => '',
        'slug' => '5Mer',
    ]);


    // Días Reto

    // $day = Day::create([
    //     'day' => 1,
    //     'fase_id' => 10,
    // ]);
    // DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    // (91, 10, $day->id, CURRENT_TIMESTAMP, NULL)");
    // DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    // (91, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    // $day = Day::create([
    //     'day' => 2,
    //     'fase_id' => 10,
    // ]);
    // DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    // (92, 10, $day->id, CURRENT_TIMESTAMP, NULL)");
    // DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    // (92, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    // $day = Day::create([
    //     'day' => 3,
    //     'fase_id' => 10,
    // ]);
    // DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    // (93, 10, $day->id, CURRENT_TIMESTAMP, NULL)");
    // DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    // (93, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    // $day = Day::create([
    //     'day' => 4,
    //     'fase_id' => 10,
    // ]);
    // DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    // (94, 10, $day->id, CURRENT_TIMESTAMP, NULL)");
    // DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    // (94, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    // $day = Day::create([
    //     'day' => 5,
    //     'fase_id' => 10,
    // ]);
    // DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    // (95, 10, $day->id, CURRENT_TIMESTAMP, NULL)");
    // DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    // (95, $day->id, '1', CURRENT_TIMESTAMP, NULL)");



    // Secretos y lista de alimentos

    // DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    // (15, 'Lista de Alimentos Empareja2', 'files/pdf/lista-de-alimentos-reto-empareja2.pdf', 10, 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");

    //DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    //(16, 'Secretos + Receta Base Del Reto', 'files/pdf/secretos-reto-empareja2.pdf', 10, 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");

    // DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    // (15, 10, '1', 'files/pdf/lista-de-alimentos-reto-empareja2.pdf', CURRENT_TIMESTAMP, NULL)");


    // Recetas

    // $recipe = Recipe::create([
    //     'name' => '',
    //     'slug' => '',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 15,
    //     'type' => 1,
    //     ]);
    //     $image = Image::create([
    //     'url' => 'recipes/retoempareja2-dia-5-receta-1.jpg',
    //     'imageable_id' => $recipe->id,
    //     'imageable_type' => 'App\Models\Recipe',
    //     ]);

    // DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    // (326, 138, $recipe->id, '1', CURRENT_TIMESTAMP, NULL)");

    // $recipe = Recipe::create([
    //     'name' => 'Intento de wrap con mantequilla de aguacate',
    //     'slug' => 'intento-de-wrap-con-mantequilla-de-aguacate',
    //     'indice'=> 1,
    //     'carbs' => 17.27,
    //     'time' => 30,
    //     'type' => 1,
    //     ]);
    //     $image = Image::create([
    //     'url' => 'recipes/retoempareja2-dia-5-receta-2.jpg',
    //     'imageable_id' => $recipe->id,
    //     'imageable_type' => 'App\Models\Recipe',
    //     ]);

    // DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    // (327, 138, $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");


    // $recipe = Recipe::create([
    //     'name' => 'Sencillito el caldito con huevito ponchadito',
    //     'slug' => 'sencillito-el-caldito-con-huevito-ponchadito',
    //     'indice'=> 1,
    //     'carbs' => 17.27,
    //     'time' => 20,
    //     'type' => 1,
    //     ]);
    //     $image = Image::create([
    //     'url' => 'recipes/retoempareja2-dia-5-receta-3.jpg',
    //     'imageable_id' => $recipe->id,
    //     'imageable_type' => 'App\Models\Recipe',
    //     ]);

    // DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    // (328, 138, $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

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

Route::get('x/whatsapp/', function(){



});


Route::get('x/clients/fase/4/{skip?}', function($skip = 0){

    $fase_four = Fase::find(4);

    $plans = Subscription::whereIn('plan_id', [1, 15, 25, 32])
    ->skip($skip)->take(100)->get();

    foreach($plans as $plan){

        if(!$fase_four->clients->contains($plan->user->id)){
            $fase_four->clients()->attach($plan->user->id);
            echo "Do it <br/>";
        }
    }
});



// Lideres Acutalizado Enero 2022
// jackie@adn-empresarial.com
// aberruncio@gmail.com
// cecibracho@gmail.com
// ancuta_stancioiu@yahoo.com
// claudiacarlomagno@gmail.com
// shanis18@gmail.com
// carrizalcity1978@gmail.com
// osvaldodebritos@hotmail.com
// edithmarcozzi75@gmail.com
// tata_0825@hotmail.com
// netcelaya@gmail.com
// reinosomercedes4@gmail.com
