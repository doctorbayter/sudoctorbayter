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

Route::get('miami/', function(){
    return redirect()->away("https://www.eventbrite.com/e/mas-alla-de-la-victoria-con-doctor-bayter-junto-drpedrito-tickets-378889818647");
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

Route::get('/reto', function () {
    return view('no-disponible');
    //return redirect()->route('reto.register', ['reto'=>'quedese-keto']);
})->name('reto.2022');

Route::get('/reto/whatsapp', function () {
    return redirect('https://chat.whatsapp.com/GliC6WZEW0CL04boWOrLBJ');
})->name('reto.whatsapp');

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


Route::get('x/day-recipe/{day}', function($day){

    $q = DB::select('SELECT * FROM day_recipe WHERE day_id = '. $day);
    dd ($q);
});

Route::get('x/day-recipe/recipe/{id}/{recipe}', function($id , $recipe){

    DB::table('day_recipe')->where('id', $id)->update(['recipe_id' => $recipe]);
    echo "do it";

});

Route::get('x/day-recipe/meal/{id}/{meal}', function($id , $meal){

    DB::table('day_recipe')->where('id', $id)->update(['meal' => $meal]);
    echo "do it";

});

Route::get('x/day-recipe/day/{id}/{day}', function($id , $day){

    DB::table('day_recipe')->where('id', $id)->update(['day_id' => $day]);
    echo "do it";

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

    /*
    //REVOLUCION GENERAL
    $plans = Subscription::whereIn('plan_id', [20,26,28,30])
                            ->skip($skip)->take(25)->get();
    $list_id = 29;
    */


    //REVOLUCION GENERAL
    $plans = Subscription::whereIn('plan_id', [36])
                            ->skip($skip)->take(100)->get();
    $list_id = 34;


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

Route::get('x/clients/reto/{month}', function ($month) {

    $plans = Subscription::whereIn('plan_id', [15])
    ->whereMonth('created_at', $month)
    ->get();
    echo "<table>";
    foreach ($plans as $plan) {
        echo "<tr>";
        echo "<td>' ";
        echo $plan->user->name;
        echo "' ,</td>";
        echo "'<td>";
        echo $plan->user->email;
        echo "'</td>";
        echo "</tr>";
    }
    echo "</table>";
});


Route::get('x/clients/{plan}/email/{skip?}', function ($plan, $skip = 0) {

    switch ($plan) {
        case 'premium':
            $subscriptions = Subscription::whereIn('plan_id', [1, 15, 25, 27, 31, 32, 37, 38, 39, 40])->get();
            break;
        case 'premium-eg':
            $subscriptions = Subscription::whereIn('plan_id', [9])->get();
            break;
        case 'selecto':
            $subscriptions = Subscription::whereIn('plan_id', [10])->get();
            break;
        case 'fase-uno':
            $subscriptions = Subscription::whereIn('plan_id', [2, 16])->get();
            break;
        case 'fase-uno-eg':
            $subscriptions = Subscription::whereIn('plan_id', [8])->get();
            break;
        case 'quedese-keto':
            $subscriptions = Subscription::whereIn('plan_id', [47])->get();
            break;
        case 'arreglo':
            $subscriptions = Subscription::whereIn('plan_id', [47])->skip($skip)->take(500)->get();
            break;
    }

    $faseuno = Fase::find(1);
    $fasedos = Fase::find(2);
    $fasetres = Fase::find(3);
    $fasecuatro = Fase::find(4);
    $fasereto = Fase::find(14);


    echo "<p>". $subscriptions->count() ." clientes inscritos en el plan ". $plan .".</p>";
    echo "</br>";

    foreach ($subscriptions as $subscription) {


       if(count($subscription->user->subscriptions) == 2){

        echo $subscription->user->email."<br><br>";

        // $faseuno->clients()->detach($subscription->user->id);
        // $fasedos->clients()->detach($subscription->user->id);
        // $fasetres->clients()->detach($subscription->user->id);
        // $fasecuatro->clients()->detach($subscription->user->id);


        // if($fasereto->clients->contains($subscription->user->id)){

        // }else {
        //     $fasereto->clients()->attach($subscription->user->id);

        // }
       }
    }

});

Route::get('x/clients', function () {
    $users = User::all();
    echo "<table>";
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>";
        echo $user->name ;
        echo "</td>";
        echo "<td>";
        echo $user->email ;
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
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

    // $recipe = Recipe::create([
    //     'name' => 'Mantequillosqui acostillado',
    //     'slug' => 'mantequillosqui-acostillado',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 15,
    //     'type' => 1,
    //     ]);
    //     $image = Image::create([
    //     'url' => 'recipes/fase4-dia-5-almuerzo.jpg',
    //     'imageable_id' => $recipe->id,
    //     'imageable_type' => 'App\Models\Recipe',
    //     ]);

     //$row = DB::table('day_recipe')->where('id', '=', '36')->update(['meal' => 1]);
    //DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (4, '3', '1', CURRENT_TIMESTAMP, NULL)");

    $plan = Plan::create([
        'name' => 'DKP + Chat 70',
        'slug' => 'plan-chat-70-oferta',
        'price_id' => 37
    ]);

    // $price = Price::create([
    //     'name' => '97 US$',
    //     'value' => 97
    // ]);

    // $plan = Plan::find(31);
    // $plan->price_id = $price->id;
    // $plan->save();

});

Route::get('x/query/reto', function(){


    //Plan y Fase del reto

    //$plan = Plan::create([
    //    'name' => 'Desafio 2023',
    //    'slug' => 'desafio-2023',
    //    'price_id' => 14
    //]);

    //$fase = Fase::create([
    //    'name' => 'Desafio 2023',
    //    'sub_name' => 'Liberate de la mierda del <span class="text-red-700">2022</span>',
    //    'descripcion' => '',
    //    'slug' => 'desafio-2023',
    //]);


    //Días Reto

    //$day = Day::create([
    //    'day' => 1,
    //    'fase_id' => $fase->id,
    //]);
    //DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    //(106, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");
    //DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    //(106, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    //$day = Day::create([
    //    'day' => 2,
    //    'fase_id' => $fase->id,
    //]);
    //DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    //(107, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");
    //DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    //(107, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    //$day = Day::create([
    //    'day' => 3,
    //    'fase_id' => $fase->id,
    //]);
    //DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    //(108, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");
    //DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    //(108, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    //$day = Day::create([
    //    'day' => 4,
    //    'fase_id' => $fase->id,
    //]);
    //DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    //(109, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");
    //DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    //(109, $day->id, '1', CURRENT_TIMESTAMP, NULL)");

    //$day = Day::create([
    //    'day' => 5,
    //    'fase_id' => $fase->id,
    //]);
    //DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES
    //(110, $fase->id, $day->id, CURRENT_TIMESTAMP, NULL)");
    //DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES
    //(110, $day->id, '1', CURRENT_TIMESTAMP, NULL)");


    //Secretos y lista de alimentos

    //DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    //(22, 'Lista de Alimentos', 'files/pdf/lista-de-alimentos-desafio-2023.pdf', $fase->id, 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");

    //DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES
    //(23, 'Secretos', 'files/pdf/secretos-desafio-2023.pdf', $fase->id, 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");

    //DB::insert("INSERT INTO fase_week (id, fase_id, week_id, resource, created_at, updated_at) VALUES
    //(24, $fase->id, '1', 'files/pdf/lista-de-alimentos-desafio-2023.pdf', CURRENT_TIMESTAMP, NULL)");



    // Recetas

    // $recipe = Recipe::create([
    //     'name' => 'Un huevo Cocido',
    //     'slug' => 'un-huevo-cocido',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 10,
    //     'type' => 1,
    //     ]);

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (362, 150, 342 1, CURRENT_TIMESTAMP, NULL)");

    // $recipe = Recipe::create([
    //     'name' => 'Ajipollin',
    //     'slug' => 'ajipollin',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 30,
    //     'type' => 1,
    //     ]);
    //     // $image = Image::create([
    //     // 'url' => 'recipes/desafio-2023-dia-1-receta-2.jpg',
    //     // 'imageable_id' => $recipe->id,
    //     // 'imageable_type' => 'App\Models\Recipe',
    //     // ]);
    //     // $video = Video::create([
    //     // 'iframe' => '<iframe src="https://player.vimeo.com/video/769187288?h=789a26548d" class="w-full h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>',
    //     // 'videoable_id' => $recipe->id,
    //     // 'videoable_type' => 'App\Models\Recipe',
    //     // ]);

    // DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    // (360, 149, $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");


    // $recipe = Recipe::create([
    //     'name' => 'Caldoso',
    //     'slug' => 'caldoso',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 20,
    //     'type' => 1,
    //     ]);

    // DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    // (361, 149, $recipe->id, '3', CURRENT_TIMESTAMP, NULL)");

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

Route::get('x/clients/fase/5mer/{skip?}', function($skip = 0){

    $fase = Fase::find(13);

    $plans = Subscription::whereIn('plan_id', [36])
    ->skip($skip)->take(100)->get();

    foreach($plans as $plan){

        if(!$fase->clients->contains($plan->user->id)){
            $fase->clients()->attach($plan->user->id);
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
