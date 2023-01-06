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

Route::get('/regalo', function () {
    return view('no-disponible');
    //$plan = Plan::find(1);
    //return redirect()->route('payment.pay', ['plan'=>$plan, 'sale'=>'regalo']);

})->name('regalo.navidad');

Route::get('reto/{reto}/register', Reto::class)->name('reto.register');

Route::get('reto/{reto}/repeticion/reunion-{day}', [Reto::class, 'replay'])->name('reto.replay');

Route::get('reto/{reto}/video', [Reto::class, 'video'])->name('reto.video');

Route::get('/reto', function () {
    //return view('no-disponible');
    return redirect()->route('reto.register', ['reto'=>'desafio-2023']);
})->name('reto.2022');

Route::get('/reto/desafio/whatsapp', function () {
    return redirect('https://chat.whatsapp.com/FLZY4t05zlrEEDnr0lEn17');
})->name('reto.whatsapp');

Route::get('/desafio', function () {
    //return view('no-disponible');
    return redirect('https://pay.hotmart.com/N77793722X?checkoutMode=10');
})->name('desafio.2023');


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
    //     'name' => 'Polluelo caldoso',
    //     'slug' => 'polluelo-caldoso',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 10,
    //     'type' => 1,
    //     ]);

    // DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    // (371, 153, $recipe->id, 1, CURRENT_TIMESTAMP, NULL)");

    // $recipe = Recipe::create([
    //     'name' => 'Lazaña bolognesa',
    //     'slug' => 'lazana-bolognesa',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 35,
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
    // (372, 153, $recipe->id, '2', CURRENT_TIMESTAMP, NULL)");


    // $recipe = Recipe::create([
    //     'name' => 'No Hay Cena',
    //     'slug' => 'no-hay-cena',
    //     'indice'=> 1,
    //     'carbs' => 0,
    //     'time' => 20,
    //     'type' => 1,
    //     ]);

    // DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    // (373, 153, 347, '3', CURRENT_TIMESTAMP, NULL)");

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

Route::get('x/clients/verify/', function($skip = 0){

    $clientes_hotmart = [
        "acristinabaezgil@gmail.com",
        "julllyetsol80@hotmail.com",
        "erika.moreno19991@gmail.com",
        "felixtapianieves090@gmail.com",
        "silyeth@hotmail.com",
        "llunaroma@gmail.com",
        "fabiola290308@hotmail.com",
        "kblanco.tf@gmail.com",
        "lider2385@gmail.com",
        "Milagrosvallesmires@gmail.com",
        "monicaarredondo86@hotmail.com",
        "yyepes5@hotmail.es",
        "martinibusiness3@gmail.com",
        "yeseniabaezm@gmail.com",
        "vgamendoza@gmail.com",
        "wainer742@gmail.com",
        "Formacionconpasion@gmail.com",
        "palombana@yahoo.com",
        "lolalupemaia3@gmail.com",
        "carloshernandolemus@gmail.com",
        "victor.ruiz33@hotmail.com",
        "mauriciojaramillolopez@gmail.com",
        "santiago.galindo@plastilinadp.com",
        "wilmap408@gmail.com",
        "davidluna3321@gmail.com",
        "jesuszambranopotes2189@gmail.com",
        "marlynkadiana@gmail.com",
        "cristyflores0201@gmail.com",
        "dc21717@gmail.com",
        "ericka.obando15@gmail.com",
        "betosanta2008@hotmail.com",
        "ingdianazambrano@gmail.com",
        "ritamai@gmail.com",
        "edwar.orozco.posso@gmail.com",
        "desiree.osio@gmail.com",
        "lucianamilanesio@gmail.com",
        "amorsote65@hotmail.com",
        "caruexpo@hotmail.com",
        "federikasydow@gmail.com",
        "pilarsydow@gmail.com",
        "caro18rv@gmail.com",
        "alexandramolina2006@yahoo.es",
        "varela_anita@yahoo.com",
        "rosme1012@gmail.com",
        "mnavarro721@hotmail.com",
        "johnzapataor@msn.com",
        "joseberni@gmail.com",
        "todoelectricovictor@gmail.com",
        "stefy_3126@yahoo.es",
        "damicela1@yahoo.com",
        "anita2632@hotmail.com",
        "angie.blu@live.it",
        "royal.jesusgonzalez@gmail.com",
        "laiacs24@gmail.com",
        "jesus-castellano@hotmail.com",
        "rommelpolancop@gmail.com",
        "angie8daniela@hotmail.com",
        "viridiana.hc.mx@gmail.com",
        "harrypardo82@gmail.com",
        "pchaustre84@hotmail.com",
        "cinthia.crivera@gmail.com",
        "wmanjarres4@gmail.com",
        "sandraluciacarrion12@hotmail.com",
        "silvana_alejandra@hotmail.com",
        "claudiafk.24@gmail.com",
        "dany_santa00@hotmail.com",
        "isabella0910@hotmail.com",
        "griselmendible62@hotmail.com",
        "loredanabello@yahoo.com",
        "ogonzalez0294@gmail.com",
        "minervavm2704@gmail.com",
        "jean.ramirez01@gmail.com",
        "leninhgonzalez1@gmail.com",
        "salvatore0112@gmail.com",
        "corinachavez80@gmail.com",
        "mariedcamejodesqueda@gmail.com",
        "afpmontoya@gmail.com",
        "dianarobayomoreno@gmail.com",
        "karina_27smith@hotmail.com",
        "yohay370920@gmail.com",
        "hilselis@hotmail.com",
        "Victorbedoya@tecnovalvulas.net",
        "Jutzegm@gmail.com",
        "marlys30@hotmail.com",
        "k.canales1091@gmail.com",
        "beloga60@hotmail.com",
        "ymb810727@yahoo.com",
        "sabigusa@gmail.com",
        "mem2509@gmail.com",
        "gloria.721@hotmail.com",
        "jamava40@yahoo.com",
        "yomendoza22@hotmail.com",
        "wallycsipr@yahoo.com",
        "olivasjaime7@hotmail.com",
        "83aleiram@gmail.com",
        "jerovt1974@hotmail.com",
        "diewolfville@hotmail.com",
        "sabel.contreras@gmail.com",
        "elianamontoyac@gmail.com",
        "dinabau0523@gmail.com",
        "johanna211084@hotmail.com",
        "antoniojhb@gmail.com",
        "herba065@comcast.net",
        "vargascastroleidy4@gmail.com",
        "frenoveja@hotmail.com",
        "astridlopez@hotmail.com",
        "alba.valdez15@gmail.com",
        "Jrbuelvas0522@gmail.com",
        "romanmgiraldog@gmail.com",
        "ferneyrocha11@gmail.com",
        "gsyanez18@gmail.com",
        "acofres@gmail.com",
        "fayunipe@hotmail.com",
        "yeseniatrejorozco@gmail.com",
        "quinterosauto@gmail.com",
        "yanimaa@gmail.com",
        "marcelarinconsantos@gmail.com",
        "joy.vega@hotmail.com",
        "magda_163@hotmail.com",
        "desiree.portela5@gmail.com",
        "katerinecardenas528@gmail.com",
        "danay_diaz@yahoo.com",
        "estefa_ov@hotmail.com",
        "yolamartin1978@gmail.com",
        "maicolromero59@hotmail.com",
        "karlacoronele@gmail.com",
        "jtatianamontoya@hotmail.com",
        "genesis.chicas97@gmail.com",
        "bellanovapasto2018@gmail.com",
        "perezluisana42@gmail.com",
        "stella@insuter.com.ar",
        "daliaalviarezc@gmail.com",
        "zuli_villamizar@hotmail.com",
        "pino8415@gmail.com",
        "jennyferuizm@gmail.com",
        "lim7maria@gmail.com",
        "dara.lp@hotmail.com",
        "vanemaceiras@hotmail.com",
        "valentina316@hotmail.com",
        "madeln69@hotmail.com",
        "lilianaardila_1123@hotmail.com",
        "maleja2195@hotmail.com",
        "katyuscalderon01@hotmail.com",
        "daniandreina3097@gmail.com",
        "mimidiaz04@icloud.com",
        "nairobifeliz27@gmail.com",
        "lunazele_02@hotmail.com",
        "nrodriguez0926@yahoo.com",
        "jovka007@gmail.com",
        "selene_venegas@live.com.mx",
        "dicricar25@hotmail.com",
        "diana1075@hotmail.com",
        "mveronicachiari@yahoo.com.ar",
        "ladinrad@hotmail.com",
        "fran4javi27@gmail.com",
        "linpaomc@gmail.com",
        "noramarmol@hotmail.com",
        "glenyvelez30@gmail.com",
        "mariaelena.amyach@gmail.com",
        "roma18azul@gmail.com",
        "Jonathan.stev.diaz@gmail.com",
        "sandrajudith.castillop@gmail.com",
        "mabeljimenez560@gmail.com",
        "apacheluis75@gmail.com",
        "karina.padilla.parra@gmail.com",
        "galopera7830@gmail.com",
        "fpalma@tgcordillera.cl",
        "sandralopcas@icloud.com",
        "kathegomez90@gmail.com",
        "joseluisotalorapuentes@hotmail.com",
        "lumope_26@hotmail.com",
        "lilianarussobravo@gmail.com",
        "mafeduma@gmail.com",
        "jjosuri@gmail.com",
        "mmediavilla2@gmail.com",
        "rjstune@hotmail.com",
        "Bello15@hotmail.com",
        "natalia-2904@hotmail.com",
        "mfernandezrivera2@gmail.com",
        "jorgeict_1202@hotmail.com",
        "karen.palaciog@campusucc.edu.co",
        "cecilia.farfan@hotmail.com",
        "2josediaz729@gmail.com",
        "jhonvelez0315@hotamil.com",
        "gabrieldiegidiob@hotmail.com",
        "erikagarciabarriga@gmail.com",
        "anggipazg79@gmail.com",
        "susan0926ba@hotmail.com",
        "ericcotrina02@gmail.com",
        "camilatovarbastidas@gmail.com",
        "abgsofirengifo@gmail.com",
        "aravenalagniel@gmail.com",
        "comprasusaorlando@gmail.com",
        "altairsortega@gmail.com",
        "francypelaez76@gmail.com",
        "ginapaosierra@gmail.com",
        "ludubeer@gmail.com",
        "dayanina@hotmail.com",
        "lauraatehortuas@gmail.com",
        "victoriayesuron@gmail.com",
        "chepenet@hotmail.com",
        "gomezyesy35@gmail.com",
        "lidumary@gmail.com",
        "gonzalezhassay@gmail.com",
        "sandralilobo2@gmail.com",
        "priscilanicolas7@gmail.com",
        "gigi.gozalo@gmail.com",
        "isama2110@hotmail.com",
        "noraimasantiago@yahoo.com",
        "santacruzvivi@hotmail.com",
        "natamelgar2000@gmail.com",
        "yuniandre@gmail.com",
        "haeyeun_pk@outlook.com",
        "susanfilippo@gmail.com",
        "danielalejandrobb@gmail.com",
        "jorpamo765@gmail.com",
        "angelicamolinas1989@gmail.com",
        "juan.pablo.restrepo@hotmail.es",
        "yus.dany.echeverry@gmail.com",
        "montiamarta@gmail.com",
        "jessicaleon02@gmail.com",
        "julianloaiza.mil@gmail.com",
        "edgardocarrero@gmail.com",
        "mikesalcer@gmail.com",
        "miguevalderrama@gmail.com",
        "miguli_13@hotmail.com",
        "jhonatan.solarte@gmail.com",
        "garomeros@hotmail.com",
        "Dra.panestesia@gmail.com",
        "sapita19691@hotmail.com",
        "oscaroyola1987@gmail.com",
        "ancardel85@hotmail.com",
        "negociossharon@hotmail.com",
        "santihv2003@hotmail.com",
        "nicolepbahamondes@gmail.com",
        "transarimayttll@gmail.com",
        "denycevasquez74@gmail.com",
        "oviedoweber@gmail.com",
        "fabianloz@gmail.com",
        "gmerly1712@gmail.com",
        "manuvale0408@gmail.com",
        "julianamonsalve20@gmail.com",
        "nesnego@hotmail.com",
        "limaesda@hotmail.com",
        "barrantesjeremy@gmail.com",
        "princess-mtz77@Outlook.com",
        "nataliaalvarez.m.to@gmail.com",
        "veronicaquintana901104@gmail.com",
        "kellimportaun@icloud.com",
        "pancook11@gmail.com",
        "dianacrivas2509@outlook.com",
        "erickamarcela_15@hotmail.com",
        "rita11190@gmail.com",
        "Raimelys.d26@gmail.com",
        "nataliahoyos925@gmail.com",
        "Garciagdianam@gmail.com",
        "electronicsmore468@gmail.com",
        "jullystefy@gmail.com",
        "vane.echeverry@hotmail.com",
        "fernanda.luengo.salazar@gmail.com",
        "apulido49@gmail.com",
        "judithcohens@gmail.com",
        "lecheverriaking@gmail.com",
        "magdaberazob@hotmail.com",
        "castillo.nathaly@gmail.com",
        "josevwolf@hotmail.com",
        "anacolmenaresvivas1712@gmail.com",
        "spahappypeacelove18@gmail.com",
        "jhova1657@gmail.com",
        "Yecalopera870@hotmail.com",
        "glow.leones@gmail.com",
        "estherrb208@hotmail.com",
        "dsierrazabala@gmail.com",
        "shirley.guzmanc13@gmail.com",
        "nubiastella6395@gmail.com",
        "yenireth_castilloa@hotmail.com",
        "j_agomez@hotmail.com",
        "willov091710@hotmail.com",
        "udlaprovincia@hotmail.com",
        "carladaniela18@hotmail.com",
        "juliarias1993@hotmail.com",
        "estherca@hotmail.com",
        "marcelaviviana20jkm@gmail.com",
        "antaju@icloud.com",
        "thepady26@hotmail.com",
        "milagritos89@hotmail.com",
        "josemanuelherasme@gmail.com",
        "leraimundi@yahoo.com",
        "jota.osorio89@hotmail.com",
        "asleydi2018@gmail.com",
        "bessynavarro@gmail.com",
        "soniabuit@hotmail.com",
        "sandraprocha23@gmail.com",
        "karelia.ramos@gmail.com",
        "nardellys@hotmail.com",
        "alessandramelo19@outlook.com",
        "andresmachado330@gmail.com",
        "cosme2701@gmail.com",
        "starlycn0318@gmail.com",
        "lorraineramirezcontreras@gmail.com",
        "andreitacdc1@gmail.com",
        "pamoreiras@gmail.com",
        "carmeniaj@gmail.com",
        "eraasmojose@gmail.com",
        "Marianacelestekert@gmail.com",
        "eleggua21.jg@gmail.com",
        "alejandraasegura3@gmail.com",
        "caviliexterior@hotmail.com",
        "loresfi_19@hotmail.com",
        "veronica.peredo@hotmail.com",
        "vanessaoramas@gmail.com",
        "jheralismanrrique@gmail.com",
        "zuniga.carolina@gmail.com",
        "encarnacionlopezjess@gmail.com",
        "lauva18@hotmail.com",
        "orietica14@hotmail.com",
        "mariajoseesencia1@gmail.com",
        "gerenciahomepalante@gmail.com",
        "loydaamell@gmail.com",
        "iqcamilagonzalez@yahoo.com.co",
        "jesimorita95@outlook.com",
        "anacristinasoraortiz@gmail.com",
        "manuel-dorado@hotmail.com",
        "jcartrucking@gmail.com",
        "daruiz.2998@gmail.com",
        "vickycruz2711@gmail.com",
        "Edwinalvear@yahoo.com.mx",
        "carcay95@gmail.com",
        "lizmarvelasquez@gmail.com",
        "milymoran908@gmail.com",
        "hildeome01@gmail.com",
        "papg73@yahoo.com",
        "jennycarolina.leon@hotmail.com",
        "almalatina50@gmail.com",
        "lauracalderon.257@gmail.com",
        "lilianosorio83@icloud.com",
        "angordillo@hotmail.com",
        "pedrosefu@hotmail.com",
        "vero.ricra23@gmail.com",
        "seigerfabian@gmail.com",
        "espemimi@aol.com",
        "carito851124@gmail.com",
        "henryarra1@hotmail.com",
        "patrycollperiodista@gmail.com",
        "adelaidarodriguezmenjura@gmail.com",
        "mayeroca@gmail.com",
        "niraidet@hotmail.com",
        "christiancamilomartinez@gmail.com",
        "elisamoncada0794@gmail.com",
        "ayerimcb78@gmail.com",
        "anderson.alvarezarango@gmail.com",
        "Niraidet2016@gmail.com",
        "santigober2012@gmail.com",
        "claretcarrillo@hotmail.com",
        "miguelangeluribed@gmail.com",
        "maucol33@gmail.com",
        "vivianramirez03@gmail.com",
        "anderson-0315@hotmail.com",
        "nikasimo@hotmail.com",
        "cris18pineda@hotmail.com",
        "yasminkelsey44@gmail.com",
        "carolgp02@hotmail.com",
        "raidel0417@hotmail.com",
        "rossmarig@gmail.com",
        "arrivasplata01@hotmail.com",
        "sandrabarahonamia@gmail.com",
        "Shelsmy33@yahoo.com",
        "andresgomezmunera@outlook.com",
        "luishsotelo@gmail.com",
        "margaritamartineztamayo@gmail.com",
        "vikkapadilla30@outlook.com",
        "emilio_diazvtr@hotmail.com",
        "lorenamel26@hotmail.com",
        "rafaelargenis@hotmail.com",
        "orev_69@yahoo.es",
        "jessicaedelmira.a@gmail.com",
        "alejandroperezv77@gmail.com",
        "mloeding@hotmail.com",
        "santiagoapch@hotmail.com",
        "lau042730@gmail.com",
        "xaviermorales373@gmail.com",
        "navarrocontmi@gmail.com",
        "isbethcarolina@gmail.com",
        "wendychacon236@gmail.com",
        "villa1991orlando@gmail.com",
        "glucklich2008@gmail.com",
        "adrianachuyen23@hotmail.com",
        "nacim.salomon@gmail.com",
        "delita0046@gmail.com",
        "bladimir.jjjj@gmail.com",
        "mndesantos@gmail.com",
        "ertavamon@gmail.com",
        "luisa@biluskinlab.com",
        "jhongomezdu@gmail.com",
        "dacasas24@yahoo.com",
        "spareproshop@gmail.com",
        "kathenmhz@gmail.com",
        "marialeja261619@gmail.com",
        "victorramirez1982@hotmail.com",
        "valbagar15@gmail.com",
        "vivirojas00@gmail.com",
        "maryval80@hotmail.com",
        "marynesbarros@gmail.com",
        "ellenremedi21@gmail.com",
        "lluviagv2@gmail.com",
        "k.azocare@gmail.com",
        "thaisdeguglielmo.cl@gmail.com",
        "modur2968@gmail.com",
        "seralejo23@gmail.com",
        "yessicavivi-14@hotmail.com",
        "acamilalopezs@gmail.com",
        "catabetancurm@hotmail.com",
        "floridaairbrushtanning@hotmail.com",
        "caro_oca8@hotmail.com",
        "palominocamila.g@gmail.com",
        "magdacparrac@hotmail.com",
        "caritoarias1979@hotmail.com",
        "lfsg84@hotmail.com",
        "gusnetmater@yahoo.com",
        "andresmolina.1994@gmail.com",
        "raul.rodriguez.ortiz1@gmail.com",
        "suyinasaavedra@gmail.com",
        "j-jsebas@hotmail.com",
        "aurelio.wendy16@gmail.com",
        "vane.alarcon.h@gmail.com",
        "richardberi@gmail.com",
        "mavp0824@gmail.com",
        "cmartinez11072000@gmail.com",
        "lizy-1940@hotmail.com",
        "dg.zpgr@gmail.com",
        "Venusdelvalle@gmail.com",
        "soluna10j@hotmail.com",
        "odlidur@hotmail.com",
        "adrianis2276@gmail.com",
        "v3r31n3q@hotmail.com",
        "ibarrajosefina98@gmail.com",
        "mirandamirrlee@gmail.com",
        "alejagr1998@gmail.com",
        "Vivajasval1983@hotmail.com",
        "adoll62@hotmail.com",
        "rahimshaker39@gmail.com",
        "aestebanocampor29@gmail.com",
        "caneve123@gmail.com",
        "garcia.gloria@hotmail.com",
        "carmen__1011@hotmail.com",
        "auroraaguirre.uag@gmail.com",
        "josgua-61@hotmail.com",
        "ismarys@hotmail.com",
        "adri28escobar@hotmail.com",
        "melayadiradianeth@gmail.com",
        "rgca79@gmail.com",
        "jorlando_41@hotmail.com",
        "marcel_vanegas@hotmail.com",
        "marcelafguerrerom82@gmail.com",
        "diamante_ejecutivo_rct@hotmail.com",
        "carlosnoceti5@hotmail.com",
        "luis.iron04@gmail.com",
        "giseladiaz201560@gmail.com",
        "cami_luengas90@hotmail.com",
        "kelysolava@gmail.com",
        "silvaroaalba1@gmail.com",
        "bolonchito70@gmail.com",
        "antonileon@gmail.com",
        "gim1472@hotmail.com",
        "rafiotalora@hotmail.com",
        "carolinaruedaqs@gmail.com",
        "guillequintero@hotmail.com",
        "lizeth_cc_2@hotmail.com",
        "aventyumi@gmail.com",
        "jeissonmonsalve@gmail.com",
        "deivis.rodas@gmail.com",
        "hectorsandovalb@gmail.com",
        "andrespertuz170@gmail.com",
        "vidaga859@gmail.com",
        "sarasantisam@hotmail.com",
        "manubel18@hotmail.com",
        "ulprez@gmail.com",
        "nanysconsuegra@gmail.com",
        "aristizabal0517@icloud.com",
        "yadielen@gmail.com",
        "francois.correa.l@gmail.com",
        "kamazuja@hotmail.com",
        "fusiondesoluciones.py@outlook.com",
        "criska12377@gmail.com",
        "cyntia0814@gmail.com",
        "aldrich@outlook.com",
        "dianaacero22@gmail.com",
        "alexxandra.noriega@gmail.com",
        "alejocleves@hotmail.es",
        "prosas0381@gmail.com",
        "hhuertas32@gmail.com",
        "lighe78@yahoo.com",
        "claudiariveras@hotmail.com",
        "deidaniacuello@yahoo.com",
        "desivenezuela@gmail.com",
        "lizardee@yahoo.com",
        "glodipe@yahoo.es",
        "analiasal@yahoo.es",
        "katez120@hotmail.com",
        "andreaclavijorojas@gmail.com",
        "jaimehoracio90@gmail.com",
        "rocio271213@icloud.com",
        "alexcumo04@gmail.com",
        "karol.j.morales@hotmail.com",
        "doraguemor@gmail.com",
        "javis.25@hotmail.com",
        "karlasiomarys@gmail.com",
        "su.perez1988@gmail.com",
        "zully3116@hotmail.com",
        "kwc718@gmail.com",
        "virginiabracho27@gmail.com",
        "martazuluaga2010@gmail.com",
        "aledis.85art@hotmail.com",
        "dayaniita.gomez@gmail.com",
        "judithgc8807@gmail.com",
        "drpatriciocando1982@gmail.com",
        "silvia.agutierrez76@gmail.com",
        "alonhego38@gmail.com",
        "lenny3018@gmail.com",
        "jjnalvarez16@gmail.com",
        "jcruiz80@hotmail.com",
        "lcortesrosillo@hotmail.com",
        "carlospastorelly@gmail.com",
        "liliancolombia@hotmail.com",
        "emalvarador@gmail.com",
        "romherrodriguez@gmail.com",
        "flyd2015@gmail.com",
        "vanejim44@hotmail.com",
        "melysantillan@hotmail.com",
        "ivonne0703@gmail.com",
        "maritzalozano31@gmail.com",
        "tefyrossi@gmail.com",
        "ne.land@hotmail.com",
        "gest.151729@gmail.com",
        "rapimotocarlos@gmail.com",
        "lapaulinasabando@hotmail.com",
        "luis-olivo@hotmail.com",
        "betancourv5@gmail.com",
        "juancpp08@gmail.com",
        "mpcalderonccs@gmail.com",
        "daisyduck1988@gmail.com",
        "alexisbello2011@hotmail.com",
        "elizabethmartinezsarmiento@gmail.com",
        "amorales@mmasociados.net",
        "lilianne747@hotmail.com",
        "coachohhc@gmail.com",
        "reinaesmeraldaf@hotmail.com",
        "yurisortizh@hotmail.com",
        "viviana1982c@yahoo.com",
        "jorge.poggioli1@gmail.com",
        "mayrasoto23@hotmail.com",
        "Grarimar@gmail.com",
        "samsalebe@gmail.com",
        "polancorico@yahoo.com",
        "elguate26@gmail.com",
        "vvalverdeb@yahoo.com",
        "mballesteros2027@gmail.com",
        "drosado52@gmail.com",
        "gustavo@azaharcoffee.com",
        "maisjibla2589@icloud.com",
        "yecapalomino@hotmail.com",
        "gralinch64@gmail.com",
        "pereirasteven210@gmail.com",
        "jorgelluis@hotmail.com",
        "nerismedina298@yahoo.com",
        "Destroyer05@hotmail.com",
        "decoysa2020@gmail.com",
        "alejandrarendonsa@icloud.com",
        "josenatividad1384@gmail.com",
        "carles@aridsgarcia.com",
        "Johamtt@hotmail.com",
        "carlos-garcera@hotmail.com",
        "yeniseidi85@gmail.com",
        "perezgrilo1@gmail.com",
        "juanksaza@gmail.com",
        "angelslc21@gmail.com",
        "kassandrarebeca@hotmail.com",
        "dr.andreshgutierrez@gmail.com",
        "soldado.leon73@gmail.com",
        "amarttinez1082@gmail.com",
        "isabelmillan7@gmail.com",
        "valentuchis0527@gmail.com",
        "elenaromero1985@icloud.com",
        "juan.pablo@pfmecanica.com",
        "evelync47@yahoo.com",
        "fersoto3991@gmail.com",
        "ramirezrojaslili@gmail.com",
        "andresdonosofotografia@gmail.com",
        "moralba12@hotmail.com",
        "luiseduardoariascifuentes@gmail.com",
        "bybymartinez@hotmail.com",
        "gerencia@montegrande.co",
        "fajila42@gmail.com",
        "marthalutovar@gmail.com",
        "mariselapanama12@hotmail.com",
        "carlos.rios@censersa.com.ar",
        "caramuto.g@gmail.com",
        "ourbill@live.com",
        "johnfredalexander@gmail.com",
        "sarah_3020@outlook.com",
        "gabyrdh2019@gmail.com",
        "ansonaro@yahoo.es",
        "silvanitarubio@hotmail.com",
        "vegacaro@hotmail.com",
        "morenoana1@hotmail.com",
        "elirosev@gmail.com",
        "desilva.isabel05@yahoo.com",
        "jesusrivdiaz@gmail.com",
        "schirleymontoya@gmail.com",
        "mvirggi60@hotmail.com",
        "franciscomutis9@gmail.com",
        "jorgeekert1902@gmail.com",
        "vanejewels01@gmail.com",
        "andresrendonquiroz@gmail.com",
        "edwin.orjuela.17@hotmail.com",
        "lrubio@pricesmart.com",
        "martinezhector22@gmail.com",
        "lizjtamaya@gmail.com",
        "teresacaicedo2013@hotmail.com",
        "mdgp28@gmail.com",
        "rranez0915@gmail.com",
        "Erikaalexa2491@icloud.com",
        "gerencia@apvlmarketing.com",
        "vasgimmara@gmail.com",
        "platinumstorage18@gmail.com",
        "brendavillalobos92@icloud.com",
        "hmildrey86@yahoo.es",
        "monidgiuca@gmail.com",
        "sug04@yahoo.com",
        "ggamarraabogada15@hotmail.com",
        "roberto.mares@ymail.com",
        "abogadozabala2015@gmail.com",
        "segura.andress16@gmail.com",
        "alexapadillanecia@gmail.com",
        "ortega.troncoso.evelyn@gmail.com",
        "racaruci@gmail.com",
        "ktyk2013@gmail.com",
        "kinyfer2022@gmail.com",
        "juanjopepe_8@hotmail.com",
        "rutpena14@gmail.com",
        "Zoraidabalza0131@gmail.com",
        "wichilobo@hotmail.com",
        "mayelicordero2@gmail.com",
        "adries0104@gmail.com",
        "chicachica471@gmail.com",
        "demeirys@gmail.com",
        "erika.626cancer@hotmail.com",
        "ombambague@unicauca.edu.co",
        "evelynnegomez@gmail.com",
        "albamy@gmail.com",
        "jquinchia@gmail.com",
        "mahe2705@gmail.com",
        "leidyaguirret.s@gmail.com",
        "danielaflores583@yahoo.com",
        "varitogarcia21@gmail.com",
        "rociopena2020@gmail.com",
        "monica-basurto@hotmail.com",
        "m.rosario1125@gmail.com",
        "ncsalazart@gmail.com",
        "herlycano2004@hotmail.com",
        "plajara@outlook.com",
        "bryanymaria@aol.com",
        "at3281774@gmail.com",
        "yulissafrancofrias@gmail.com",
        "anagarcia_06@hotmail.com",
        "soybillonario21@gmail.com",
        "marcelasantori@gmail.com",
        "sergio.carrillo@alumni.duke.edu",
        "aniuska.infante84@gmail.com",
        "yesica041990@hotmail.com",
        "connyfe25@gmail.com",
        "normahe@gmail.com",
        "luanme2006@hotmail.com",
        "elsita1417@hotmail.com",
        "pmesanelly@gmail.com",
        "lauraandre@gmail.com",
        "nathalylugo1991@hotmail.com",
        "bivi84@hotmail.com",
        "barona18@hotmail.es",
        "sergsuazo@gmail.com",
        "zawa_alex@yahoo.es",
        "giraldoescobarmanuela@gmail.com",
        "evargasugalde@gmail.com",
        "lloidr@hotmail.com",
        "arodriguez.decena@gmail.com",
        "rosasa3@hotmail.com",
        "soyeduardocs@gmail.com",
        "melda_lui@hotmail.com",
        "auramonas@gmail.com",
        "karengaviria@hotmail.com",
        "alexad_228@hotmail.com",
        "johan_jubei@hotmail.com",
        "ka.morillo@gmail.com",
        "ar.heindl@gmail.com",
        "verovalen2419@gmail.com",
        "joha.h3004@hotmail.com",
        "ramirezacevedostephanie@gmail.com",
        "monicapradapinilla@hotmail.com",
        "evediaz990617@gmail.com",
        "nmandradep@gmail.com",
        "lmsa_0587@hotmail.com",
        "berniejose1707@gmail.com",
        "sandoval_isabel@hotmail.com",
        "ladyelizabeths@yahoo.com",
        "karlyram1990@gmail.com",
        "felip08arevalo@gmail.com",
        "aurajmartinezb@hotmail.com",
        "aideeru@hotmail.com",
        "yolimanpe@yahoo.es",
        "scarletha87@hotmail.com",
        "cinca12@hotmail.com",
        "maira27acosta@gmail.com",
        "pvelasquezg@hotmail.com",
        "paulawabnik@hotmail.com",
        "mayteapa1972@gmail.com",
        "mariselacanacope@gmail.com",
        "oernestina@gmail.com",
        "oremar3@hotmail.com",
        "lourdes@konseguros.com",
        "mfundases@gmail.com",
        "kellysdominguez84@gmail.com",
        "alarom426@hotmail.com",
        "ivanmachain1986@gmail.com",
        "soniamorantes@gmail.com",
        "tachaliana@gmail.com",
        "leidyduquecano28@gmail.com",
        "nanaortiz1512@hotmail.com",
        "claralizardo76@gmail.com",
        "monicapin70@hotmail.com",
        "andradetatiana1988@gmail.com",
        "wendyborjac@hotmail.com",
        "vemocar_24@hotmail.com",
        "zuletatania88@gmail.com",
        "cquinter@hotmail.com",
        "dianagutierrez22@hotmail.com",
        "vanessa_torres_rey@hotmail.com",
        "cococisneros@hotmail.com",
        "mariadelosangeles486@hotmail.com",
        "jesusespinoza1507@gmail.com",
        "pamelagonzales20@gmail.com",
        "malory_pereira@hotmail.com",
        "cindycorona2@hotmail.com",
        "delgado.arlys@gmail.com",
        "ginasaotome@yahoo.com",
        "yennyvizc@hotmail.com",
        "rosacavasinni@hotmail.com",
        "Olga_colmenares@hotmail.com",
        "erly1601@gmail.com",
        "jojosnypizza@gmail.com",
        "kervinzico.kz@gmail.com",
        "jessika_1017@hotmail.es",
        "yaris60051@yahoo.com",
        "fabriciomatu@live.com.ar",
        "pjimeno.reales@gmail.com",
        "jessiel1796@gmail.com",
        "andresrodriguezbaloa@gmail.com",
        "elizamart.92@gmail.com",
        "karinacleto20@icloud.com",
        "carlos@fenixrealty.net",
        "zandy19890510@gmail.com",
        "jgv.0893@gmail.com",
        "rayssysanchezalfau@gmail.com",
        "miritorne@gmail.com",
        "dabm1705@gmail.com",
        "veronicaterrell@hotmail.com",
        "victorclips@aol.com",
        "pauribe8@gmail.com",
        "katita_2021@outlook.com",
        "nandagonzalezavila@hotmail.com",
        "mari7726@gmail.com",
        "analucia.barrios@hotmail.com",
        "jeimy_tj@outlook.com",
        "edpalomares@outlook.com",
        "eusebio23@outlook.com",
        "beltran.johan10@gmail.com",
        "annachrisgb@gmail.com",
        "darc77@hotmail.com",
        "jeisonwin@hotmail.com",
        "lachica_5132@hotmail.com",
        "gabrielleones89@hotmail.com",
        "constanza2102@hotmail.com",
        "jevahos@hotmail.com",
        "sebas1321@gmail.com",
        "linamonsalve21@hotmail.com",
        "jarmijv@yahoo.com",
        "dilmerchamorrom@gmail.com",
        "andrese30guerra@gmail.com",
        "mayira1210@hotmail.com",
        "olga.granadosramirez@yahoo.es",
        "vasquez.larry@gmail.com",
        "dianavanhelder@gmail.com",
        "bmendietadiaz@gmail.com",
        "evao18@gmail.com",
        "abigagarcia1996@gmail.com",
        "natalia.junio18@hotmail.com",
        "lmoreraalvarez@gmail.com",
        "mildret523@gmail.com",
        "andre12_5@hotmail.com",
        "amortizf@gmail.com",
        "fadul98@hotmail.com",
        "catheayub@gmail.com",
        "ivan.pumax@gmail.com",
        "jose-sierralara@outlook.com",
        "bealieug1980@gmail.com",
        "brasil244@hotmail.com",
        "nanacaceres231@gmail.com",
        "tatiunilibre1@gmail.com",
        "silvadolores38@gmail.com",
        "montsepahe@gmail.com",
        "ronaldveraf@gmail.com",
        "andreapelaez220578@hotmail.com",
        "andream128@hotmail.com",
        "regiepereiraestrada@gmail.com",
        "maritzacabrerar@gmail.com",
        "roabastidas1991@gmail.com",
        "Jasasa2602@hotmail.com",
        "mmalvidg@yahoo.es",
        "castellanisimo@gmail.com",
        "vivi_trillosv@hotmail.com",
        "darlenevb95@gmail.com",
        "miguelrgt2@hotmail.com",
        "analiacardozoy@gmail.com",
        "JENNIFERVPULIDO@GMAIL.COM",
        "claudiaiba27@hotmail.com",
        "ransiogordo@gmail.com",
        "a.bessy@yahoo.com",
        "pablo.ceraso@hotmail.com",
        "luisannaangulo@gmail.com",
        "joseflorez_10@hotmail.com",
        "wawaretana6@gmail.com",
        "nubia1florian@gmail.com",
        "ergariv@hotmail.com",
        "suarezlm.42@gmail.com",
        "marquezyb@gmail.com",
        "rosag3945@gmail.com",
        "marbel-1512-1990@hotmail.com",
        "yuli.poveda426@gmail.com",
        "arihernandeztorres@gmail.com",
        "fernando.gavica@aldeberan.com.ec",
        "cedenogasca@gmail.com",
        "veradiez@gmail.com",
        "jicala91@gmail.com",
        "cataruizolaya@gmail.com",
        "lalberto24.ll@gmail.com",
        "narvaez_wilber@hotmail.com",
        "nclperdomo@gmail.com",
        "lan762@hotmail.com",
        "yelian@yahoo.com",
        "marcelpinzon@hotmail.com",
        "nellyduartevargas@gmail.com",
        "a.talero@hotmail.com",
        "rosabelnaites@gmail.com",
        "justqualitywash@gmail.com",
        "stefhaniav.g@gmail.com",
        "movalza@gmail.com",
        "caritoarre@hotmail.com",
        "villaseglory@gmail.com",
        "arevalocamilo218@gmail.com",
        "fernandezmarco362@gmail.com",
        "mile753@msn.com",
        "javitoavi729@gmail.com",
        "Codelecml0903@hotmail.com",
        "cindyvanegaspm@gmail.com",
        "anndreapamplona@gmail.com",
        "vivianagalvez26@gmail.com",
        "limarishernandez@gmail.com",
        "henryher01@gmail.com",
        "karzele@icloud.com",
        "esanabell@yahoo.com",
        "charito2222@hotmail.com",
        "catalina.botiam@gmail.com",
        "marthac.jimenezg@gmail.com",
        "alevegago@hotmail.com",
        "maria6958@gmail.com",
        "linch_ycha_2007@hotmail.com",
        "mauraroman@icloud.com",
        "mauraroman@gmail.com",
        "berenett777@hotmail.com",
        "diaz.09gabriela93viki@gmail.com",
        "Maitenrosales@gmail.com",
        "mariadorisfaria@gmail.com",
        "fe.greivin@gmail.com",
        "eugeniacea@gmail.com",
        "Fabrinho_do@hotmail.com",
        "aranegociosneuquen@gmail.com",
        "wjaimepl@gmail.com",
        "leidy.colom@gmail.com",
        "marcos0204medina@gmail.com",
        "rossyaleva@hotmail.com",
        "ninoskamolper@gmail.com",
        "mariaelenarebollo@icloud.com",
        "cesarnino2402@gmail.com",
        "lgglobal13@gmail.com",
        "ramirezrusso@gmail.com",
        "Jorgemarquezm33@gmail.com",
        "addrian0009@hotmail.com",
        "sarita.brand@avpindustrial.com",
        "valeriehtirado@gmail.com",
        "anitagranadar@gmail.com",
        "chrismorenobjj@yahoo.com",
        "viviana1128@hotmail.com",
        "cct365@gmail.com",
        "sabanalarga@aol.com",
        "mechej376@gmail.com",
        "lromero607@unab.edu.co",
        "jkmejiavelez@gmail.com",
        "mjrottsfox@hotmail.com",
        "ileanamar0711@gmail.com",
        "ingridjulio@hotmail.com",
        "ismael12550@hotmail.com",
        "jose@josevilas.net",
        "mnewboles@holycross-hutch.com",
        "bronsonr12@gmail.com",
        "yasmelyboscan@hotmail.com",
        "varenaidame@hotmail.com",
        "alexisturiz@hotmail.com",
        "liseth1530@hotmail.com",
        "lore.fer.villa@hotmail.com",
        "clarita.mari.pao1103@hotmail.com",
        "rosaalejandralealsoto@gmail.com",
        "anbibian@hotmail.com",
        "crcaldera@gmail.com",
        "jesussoto_04@hotmail.com",
        "valenciagerald77@gmail.com",
        "tatizu84@gmail.com",
        "epimentelsuli26@gmail.com",
        "aggb2309@gmail.com",
        "ruth_erodriguez@hotmail.com",
        "mulleralejo@gmail.com",
        "pcruz0052@gmail.com",
        "miguelp39@gmail.com",
        "monygarzon@gmail.com",
        "alonsoaguilar1988@hotmail.com",
        "espinosagm_@hotmail.com",
        "superlineascartagena@outlook.com",
        "josemaringarcia27@gmail.com",
        "mc.blackman@icloud.com",
        "recaudojuridico@hotmail.com",
        "jenitcitaloor@hotmail.com",
        "dcastillop2208@gmail.com",
        "javierzs11@hotmail.com",
        "luisgamboa3186@gmail.com",
        "magpalaba@hotmail.com",
        "ingrygallego2010@hotmail.com",
        "ednarangel85@icloud.com",
        "gema20.dossantos@gmail.com",
        "jnamen@hotmail.com",
        "KELLY_GUTIERREZDELA@YAHOO.COM",
        "annie.daboin@gmail.com",
        "p-gorriaran@hotmail.com",
        "tarjetaslatelier@hotmail.com",
        "gaorfei33@gmail.com",
        "salomecita0203@gmail.com",
        "mfarinha10@hotmail.com",
        "cepisano@icloud.com",
        "osmanmiranda25@gmail.com",
        "bacs060667@gmail.com",
        "noeaminespinal@gmail.com",
        "tifasaludable@gmail.com",
        "eddielabradorp@gmail.com",
        "falvarado2@hotmail.com",
        "ortizcarlos24@gmail.com",
        "isabelyandreaplaza@gmail.com",
        "diana.always@hotmail.es",
        "bryant_093@hotmail.com",
        "margaritatrianag@hotmail.com",
        "jlg_2009@hotmail.com",
        "nathalie.almon85@gmail.com",
        "andres.salas.figueroa@gmail.com",
        "maribelsierrazuniga@hotmail.com",
        "antoniolans01@hotmail.com",
        "mympapeleria2018@gmail.com",
        "rymerluis@gmail.com",
        "narya198@hotmail.com",
        "gladys-reyes@live.com.mx",
        "alextav22@hotmail.com",
        "piagiovannetti@gmail.com",
        "zory@sertesa.com",
        "zentella_leonardo@hotmail.com",
        "raulf.rivero@gmail.com",
        "casasricardo743@gmail.com",
        "vavalder.vv@gmail.com",
        "fabiolamora9@hotmail.com",
        "veronica-1802@hotmail.com",
        "lgomezastua@hotmail.com",
        "juank198578@gmail.com",
        "jorgeblancoariza@gmail.com",
        "rcoronaz@hotmail.com",
        "pardo340@hotmail.com",
        "johnarroz@gmail.com",
        "isa112323@gmail.com",
        "luisaurelio.rincongarcia@gmail.com",
        "ljv1114@gmail.com",
        "karen860504@hotmail.com",
        "mateo.j.a@hotmail.com",
        "juanisglo@gmail.com",
        "dianamatallana1@gmail.com",
        "delgadoginna@yahoo.es",
        "franklinjgb@gmail.com",
        "silviajpy@hotmail.com",
        "maritoel22purobox@gmail.com",
        "fgomesdb@gmail.com",
        "cristinaisabelgarcia1966@outlook.com",
        "vier.geo28@gmail.com",
        "niujared0310@hotmail.com",
        "rasato2002@gmail.com",
        "Isidelfiguera@hotmail.com",
        "marvinmms82@gmail.com",
        "isaachernandez263@gmail.com",
        "geobardo@gmail.com",
        "abetolo2802@icloud.com",
        "pdiaz@pldmechanics.com",
        "wilmargarcia.vergara1978@gmail.com",
        "rubintellol@gmail.com",
        "versebas@gmail.com",
        "jessicapradacastro@gmail.com",
        "yeile81@hotmail.com",
        "malejandracamargoo@gmail.com",
        "magonzalez.1678@gmail.com",
        "edselprado@yahoo.es",
        "jovanmonroy@hotmail.com",
        "marinaguillen8875@gmail.com",
        "rosa.e.collazos@gmail.com",
        "antonioherce@icloud.com",
        "m.saborio2000@gmail.com",
        "jesicariverosr@icloud.com",
        "rosamariapimentel13@gmail.com",
        "emyria.villalba@gmail.com",
        "yudap_s@hotmail.com",
        "Luzrosalbaflorez07@gmail.com",
        "Josueolmos11@gmail.com",
        "angelgguzmang@gmail.com",
        "barreratex@gmail.com",
        "andreajara.s@gmail.com",
        "istvanc@gmail.com",
        "hirne50@gmail.com",
        "mafepalencia3@gmail.com",
        "ana.martelo.alcala@gmail.com",
        "ambarberry123@gmail.com",
        "jpherrera2008@gmail.com",
        "marcelau15@hotmail.com",
        "angie_2417@hotmail.com",
        "petrickgonzalez@gmail.com",
        "andtespipediaz1@gmail.com",
        "fabio9087@gmail.com",
        "fitmom_12@outlook.com",
        "camsoltero@yahoo.com.mx",
        "lidiaperez33@hotmail.com",
        "nicolas.alvarez9701@gmail.com",
        "vale851114@gmail.com",
        "cafelosshyris@hotmail.com",
        "norexalejandra41@gmail.com",
        "martaquinteros1969@icloud.com",
        "joseale17@gmail.com",
        "erikaburgospetit@gmail.com",
        "plazacons@gmail.com",
        "eveliobarbosa90@gmail.com",
        "valeriacardenas96@gmail.com",
        "victorhugo_494@hotmail.com",
        "gerencia@tiendasmartina.com",
        "aidee_choconta@hotmail.com",
        "romo.ed@gmail.com",
        "jjhon.gonzalez.25@gmail.com",
        "lapreasilvia@gmail.com",
        "c.botero92@gmail.com",
        "diazmariajose.c@gmail.com",
        "marielca26@hotmail.com",
        "mp252832@gmail.com",
        "alicearosa1@gmail.com",
        "deleonivonne@yahoo.com.ar",
        "hurtadoaguilarkiara@gmail.com",
        "milojose2014@gmail.com",
        "luisen.guzman@gmail.com",
        "jejevi878@gmail.com",
        "ing.rodrigoarias@gmail.com",
        "edwin.anaya15@gmail.com",
        "bermejocaballero.belen@gmail.com",
        "alvarezrosanny@gmail.com",
        "elsybermeobe@gmail.com",
        "darwindavidpalmabr@gmail.com",
        "mariangela.osio@gmail.com",
        "ferranduocastella@gmail.com",
        "genylucia@hotmail.com",
        "myriamaguiar@gmail.com",
        "juancasanovasantoyo@gmail.com",
        "kateriveras@gmail.com",
        "danevill@icloud.com",
        "nestorgarcia8555@gmail.com",
        "cccastilloc@hotmail.com",
        "bisales@aol.com",
        "linmar2008@gmail.com",
        "cesarpferrer@gmail.com",
        "cavier04@yahoo.com",
        "eleonard30@hotmail.com",
        "margieffe@gmail.com",
        "draraquelangulo@gmail.com",
        "bk.mora@gmail.com",
        "willyani_0527@hotmail.com",
        "annevp76@gmail.com",
        "fabianiti0129@gmail.com",
        "claudia.araceli74@hotmail.com",
        "christinaplanas@gmail.com",
        "andykpo06@hotmail.com",
        "yamile03@gmail.com",
        "wdfbless@outlook.com",
        "josehugo.angaritam@gmail.com",
        "katha38@hotmail.com",
        "cristhiand62@hotmail.com",
        "clahr80@gmail.com",
        "reo_r@hotmail.com",
        "garciaberardo@gmail.com",
        "industriaschiacalderon@gmail.com",
        "vchro1@gmail.com",
        "ceresrey@msn.com",
        "caritobl88@gmail.com",
        "oscarwzambrano@gmail.com",
        "lindajolp@gmail.com",
        "alee22871@gmail.com",
        "mfeben715@gmail.com",
        "elkisespinosa@yahoo.com",
        "miavilauga@gmail.com",
        "gab6398@gmail.com",
        "johanramos8919@icloud.com",
        "jubuo@hotmail.com",
        "liyerseb@gmail.com",
        "marazulquieto@live.com.ar",
        "draneiry@hotmail.com",
        "claudiachain@hotmail.com",
        "facturascarla09@gmail.com",
        "gisselafc@gmail.com",
        "fabiola.ysabel1320@gmail.com",
        "eduardomendes032010@gmail.com",
        "lockhartlugo04@gmail.com",
        "ivanantoniot@hotmail.com",
        "lmmartinez500@hotmail.com",
        "enidsa78@hotmail.com",
        "ingliranzo74@gmail.com",
        "ana_0527@hotmail.com",
        "laborlinares@yahoo.com.ar",
        "miguelquinteroy20@gmail.com",
        "jpbejaranos@gmail.com",
        "karen_germenus@hotmail.com",
        "josegomezadriani@gmail.com",
        "adrianaludmir@gmail.com",
        "patovalencialex@outlook.com",
        "gordong25@hotmail.com",
        "Madelinreynoso@gmail.com",
        "normitatoribio@gmail.com",
        "paulamariamorlans@gmail.com",
        "rosygonzalez0582@gmail.com",
        "arisvanegas2009@gmail.com",
        "carlos.nicolopulos@gmail.com",
        "fjgonzalezn07@gmail.com",
        "riquelmemariadelcarmen050@gmail.com",
        "saocd@me.com",
        "ancladeamor@gmail.com",
        "laurapati23@hotmail.com",
        "linaclau86@hotmail.com",
        "cn8427008@gmail.com",
        "ksb2809@gmail.com",
        "polimarfm@gmail.com",
        "valentinexlopez@gmail.com",
        "gonzafredy@hotmail.com",
        "olgapaz62@gmail.com",
        "alquimia@hotmail.fr",
        "auid880@hotmail.com",
        "mariene_correa@hotmail.com",
        "cptimana@gmail.com",
        "claudiaestherortiz@gmail.com",
        "elianitaaviles@gmail.com",
        "y.araya_xena@hotmail.com",
        "aivargas78@hotmail.com",
        "caballerosmg@gmail.com",
        "laura_power@hotmail.com",
        "begratacos@hotmail.com",
        "acensolise10@gmail.com",
        "marianalatorre91@yahoo.com.ar",
        "f.angelagomez@gmail.com",
        "milerody@gmail.com",
        "lizperez1805@gmail.com",
        "ckmacho11@gmail.com",
        "leivarenta@gmail.com",
        "antarguedas@bancobcr.com",
        "pinto86@hotmail.com",
        "iruela@gmail.com",
        "claudyaroque1705@gmail.com",
        "arq.kevinmartinez@gmail.com",
        "chefestebanrs@gmail.com",
        "sebastian_1030@hotmail.com",
        "rosacastillo010514@gmail.com",
        "j.balcazartanaka@hotmail.com",
        "gpsteam2016@gmail.com",
        "silverioelizabeth21@gmail.com",
        "epumahinos@gmail.com",
        "dagpersonal@hotmail.com",
        "anamariasoriaorna@gmail.com",
        "carmelinau@hotmail.com",
        "yenny97alvarez@hotmail.com",
        "laugavi@hotmail.com",
        "olgadifer318@gmail.com",
        "yahaira_madrigal@hotmail.com",
        "marthapinales@outlook.com",
        "miguelbernal0@gmail.com",
        "loviedo2301@icloud.com",
        "rnheras@gmail.com",
        "gandicamaria02@gmail.com",
        "jeetluva3@gmail.com",
        "reynabalicia@gmail.com",
        "ivonne@elsarealty.com",
        "m.lealo@gmail.com",
        "Yeseniamcordero@hotmail.com",
        "acumin80@gmail.com",
        "pulido1975aldo@gmail.com",
        "liliana.blanco0718@gmail.com",
        "jencam583@hotmail.com",
        "O.marrero27@gmail.com",
        "nayrelisguzman@gmail.com",
        "analuvac@gmail.com",
        "shanois339@gmail.com",
        "massielsaime@gmail.com",
        "nadiaelena06@gmail.com",
        "luzgomez26@hotmail.com",
        "stefagomez7@gmail.com",
        "spyder682@hotmail.com",
        "anamaria.salazzar@hotmail.es",
        "maria66924746@gmail.com",
        "sofi160307@hotmail.com",
        "paolaotalvarof@yahoo.com",
        "gnarvaez@hotmail.es",
        "maria.lauria@gmail.com",
        "lizdelima0110@gmail.com",
        "rodrigolv95@gmail.com",
        "catterin.mills@gmail.com",
        "jahayala@gmail.com",
        "jolesibi89@gmail.com",
        "yaqueline_p@hotmail.com",
        "alejosilvaa02@gmail.com",
        "ronaldmeneses180381@gmail.com",
        "saabj84@hotmail.com",
        "idubermontesmiami@gmail.com",
        "fabiomanosalva524@hotmail.com",
        "smaybely@gmail.com",
        "guerrero.aldemar@gmail.com",
        "natalidimoreno@gmail.com",
        "maryrumbafit77@gmail.com",
        "yolimars999@gmail.com",
        "behappymasol@icloud.com",
        "zagoam@gmail.com",
        "annyv25@yahoo.com",
        "mafe0378_@hotmail.com",
        "miluavalos7777@gmail.com",
        "valeriaburgoa@gmail.com",
        "ivaangulo@yahoo.com",
        "saraemy728@hotmail.com",
        "oscarauvel@gmail.com",
        "mendezplazad@gmail.com",
        "evelinbueno5@gmail.com",
        "liseth312@hotmail.com",
        "anadeliaynoa05@gmail.com",
        "patico.torres@hotmail.com",
        "eliyised@hotmail.com",
        "Diferoherr@gmail.com",
        "constanzamonod@hotmail.com",
        "carolyman5@hotmail.com",
        "yohomero_ypunto@hotmail.com",
        "sernor5474@hotmail.com",
        "carlos@rimola.net",
        "valeimy2002@gmail.com",
        "martha.martinez79@yahoo.com",
        "aplaza9@hotmail.com",
        "sandraacostallanos@hotmail.com",
        "yuliza04@hotmail.com",
        "neus_llaurado@hotmail.com",
        "juancali17@hotmail.com",
        "luimibm@gmail.com",
        "miosoty.ramos@gmail.com",
        "deltavictorco@gmail.com",
        "gruposigmabogota@gmail.com",
        "rebe_lil@hotmail.com",
        "smac1505@hotmail.com",
        "sabrinavaldivia@hotmail.com",
        "lazaro_monica@hotmail.com",
        "quintanspaco@gmail.com",
        "mendezgabriela320@gmail.com",
        "kathe0689@hotmail.com",
        "mmarquezjmp@gmail.com",
        "yesicalopezdominguez@icloud.com",
        "laurayisethm@gmail.com",
        "henrryrodriguez@usantotomas.edu.co",
        "sebastianencina0509@gmail.com",
        "yenzamaria7@gmail.com",
        "kathylovs@gmail.com",
        "camachoaldo@icloud.com",
        "greypelaez@gmail.com",
        "sandralatorre2017@gmail.com",
        "claudiarada1967@gmail.com",
        "leonardonegron17@hotmail.com",
        "mafe722000@gmail.com",
        "kafer02@gmail.com",
        "dominick.xfortnitex.090@gmail.com",
        "vladimirdelosrios@hotmail.com",
        "carlos-frank2001@hotmail.com",
        "aidangelica1@hotmail.com",
        "natidsc31@gmail.com",
        "carinatupalle@hotmail.com",
        "velasquezluisa92@gmail.com",
        "jjmora2121@gmail.com",
        "luzadelamonsalve@gmail.com",
        "marcelaramirezg@gmail.com",
        "ing.sergan@gmail.com",
        "jeka0587@gmail.com",
        "fabrizziorod1994@gmail.com",
        "Jcfonck18@gmail.com",
        "alberto.abril.bernal@gmail.com",
        "eligo3069@gmail.com",
        "tommycarmona@gmail.com",
        "sandritag12@hotmail.com",
        "sofigranadoss@gmail.com",
        "wiifox@live.ca",
        "benson.jony.jb@gmail.com",
        "aalejandramb@hotmail.com",
        "melvinenriquediaz@gmail.com",
        "sandra1390@icloud.com",
        "andrea.agrelo@hotmail.com",
        "alejoquinteroh@gmail.com",
        "ferbetts@gmail.com",
        "fonssifonssi10@gmail.com",
        "hfbadillo@hotmail.com",
        "karla.bernal.f@gmail.com",
        "castellanoscruz510@gmail.com",
        "maricc1501@gmail.com",
        "rodolfoperez7080@gmail.com",
        "franchescavitali1@gmail.com",
        "rosasandoval657@gmail.com",
        "natti2vidas@hotmail.com",
        "vasquezguerra2802@gmail.com",
        "aidanohemifernandezleon25@gmail.com",
        "rosasandoval657@gml.com",
        "allan_tb@hotmail.com",
        "guillecarandino1975@gmail.com",
        "marioreypaez@gmail.com",
        "carlosjosepisano@gmail.com",
        "marcos_alonso@hotmail.com",
        "alciniava@gmail.com",
        "Yajairarpg@hotmail.com",
        "dianaarh27@gmail.com",
        "organer015@hotmail.com",
        "frank.carcases@gmail.com",
        "josemontalvo30@gmail.com",
        "valecabra3011@gmail.com",
        "Camilomeneses3@gmail.com",
        "msarabia101@gmail.com",
        "yoliri45@yahoo.com",
        "davidricardorodriguez@hotmail.com",
        "erikaediazp@hotmail.com",
        "natikaa94@gmail.com",
        "elkike463@gmail.com",
        "dasymont@gmail.com",
        "juandumar22@hotmail.com",
        "wisco69@hotmail.com",
        "caromejiart@gmail.com",
        "martharta@hotmail.com",
        "diaznavas@hotmail.com",
        "madiana28@hotmail.com",
        "brantonydiaz@gmail.com",
        "francelinacarvajal@gmail.com",
        "jose.chinchilla2012@hotmail.com",
        "juancastano59@gmail.com",
        "m_lara_4@hotmail.com",
        "turquesa977@hotmail.com",
        "itzeladeo@gmail.com",
        "shayreejmg@hotmail.com",
        "deliocastro@hotmail.es",
        "Isapego02@outlook.com",
        "wjenariza@gmail.com",
        "camilazamoracortes@gmail.com",
        "laura.arrocain15@gmail.com",
        "montsemc3322@gmail.com",
        "Franciainesperezzapata@gmail.com",
        "isabelana_run@hotmail.com",
        "paolaavella81@gmail.com",
        "chrisjat13@gmail.com",
        "robeach@hotmail.com",
        "salome0626.stefaniaurream@gmail.co",
        "patriciaespinosa@gsp.edu.ec",
        "sandramilena19-08@hotmail.com",
        "gloriamede1956@hotmail.com",
        "paolaher2012@gmail.com",
        "gabytrejoderivas@hotmail.com",
        "molkea092623@gmail.com",
        "Olgapelaez54@hotmail.com",
        "mirthaleon84@gmail.com",
        "diezfernandez5@gmail.com",
        "dra.mendozaferreira@hotmail.com",
        "MARYGONZALEZGANTES@GMAIL.COM",
        "rodrileiton@hotmail.com",
        "agualdron17@gmail.com",
        "lopezmayleen@yahoo.com",
        "oscar.villegas@hnbamerica.com",
        "samuel.otalora@hotmail.com",
        "giovannaparada@hotmail.com",
        "asxipe21@gmail.com",
        "lorengelvez23@gmail.com",
        "josegabrielperez.07@gmail.com",
        "iwalterv@gmail.com",
        "karyscorpio83@gmail.com",
        "gpreciadoo@gmail.com",
        "financialbritton@gmail.com",
        "veusse1@hotmail.com",
        "nellyz77@hotmail.com",
        "chanel.ramirez2014@gmail.com",
        "felipeharlowe@gmail.com",
        "arisnellberrocal5719@gmail.com",
        "rvargasmon15@gmail.com",
        "juanantoniomendozavazquez1@gmail.com",
        "yasmingq@gmail.com",
        "caromejia10@hotmail.com",
        "mary71716@gmail.com",
        "ing.williamramirez@yahoo.com",
        "patperba18@gmail.com",
        "refriblady@gmail.com",
        "caale1030@gmail.com",
        "yestergonzalez12@gmail.com",
        "albavperezrubio@gmail.com",
        "youssettelara@gmail.com",
        "victorgranado19.2@gmail.com",
        "jrpdmartha@gmail.com",
        "judith.martinez1110@gmail.com",
        "aj.villcast89@gmail.com",
        "lucyjuralan31@gmail.com",
        "monicafortunato16@gmail.com",
        "vivibuma@hotmail.com",
        "liliana.obando@hotmail.com",
        "pedroantonio038@gmail.com",
        "ssmith@ortomedicpanama.com",
        "nataluna400@hotmail.com",
        "samiruzu@me.com",
        "valerolanderlfrancisco@gmail.com",
        "anapatricia.tobar@gmail.com",
        "elianaardila@hotmail.com",
        "julvismena@gmail.com",
        "karolsusan2211@gmail.com",
        "monikita626@yahoo.com",
        "arieldejesuspaez@hotmail.com",
        "chemmelmann@hotmail.com",
        "gus1895@gmail.com",
        "nerey_santy@hotmail.com",
        "monserrate.angel@gmail.com",
        "anitasierra11@hotmail.com",
        "chaparrore02@gmail.com",
        "betancourangela@yahoo.ca",
        "leidysuarezhernandez@hotmail.com",
        "milagroyucra.bo@gmail.com",
        "gabylimabsas@gmail.com",
        "caroorigenes20@gmail.com",
        "soliscandy2@gmail.com",
        "maloca2007@hotmail.com",
        "ivanfloresnu@gmail.com",
        "miosotycabrera0516@gmail.com",
        "maximaca01@gmail.com",
        "kebeyanessim@gmail.com",
        "luisgeonaga@gmail.com",
        "avendanokathy@gmail.com",
        "dr.cerna1@gmail.com",
        "lorenita9730@hotmail.com",
        "eliadri-05@hotmail.com",
        "nefrissmascareno@gmail.com",
        "jlcb_201992@hotmail.com",
        "ana.rosa.labelle@outlook.com",
        "ypatricianc@hotmail.com",
        "griselda_herreras@hotmail.com",
        "patriciaosira@yahoo.com.ar",
        "mmunoz@rsed.org",
        "jenquan2192@gmail.com",
        "heinercanedo1@hotmail.com",
        "eromedico@hotmail.com",
        "fliazamoras@gmail.com",
        "lina@linabotero.ca",
        "Ccabello3008@gmail.com",
        "conchaalonso2009@gmail.com",
        "paulina.1967@hotmail.com",
        "a.miolan@congelam.com",
        "jorgemoreirac@outlook.es",
        "ceciliachaz717@gmail.com",
        "marsofi@gmail.com",
        "giha3891@gmail.com",
        "ydsia65@yahoo.com",
        "andepigopo@gmail.com",
        "marosa48@gmail.com",
        "carokarey@hotmail.com",
        "williamcaicedobisnes@gmail.com",
        "alfonso27cruz@yahoo.com",
        "rodriguezwaneli@gmail.com",
        "molinatapascoviviana@gmail.com",
        "katty.garrido@gmail.com",
        "sergioandrescastillo0@gmail.com",
        "yanethverag@hotmail.com",
        "joaquinmejiapuerto@gmail.com",
        "akemybenites@hotmail.com",
        "paz84014@gmail.com",
        "beaague@gmail.com",
        "frncschrnndzsml@gmail.com",
        "melissabolanosugalde@gmail.com",
        "jesus.molina9421@gmail.com",
        "vinga5012@aol.com",
        "daisyliketheflower.89@gmail.com",
        "elvispalenciatrillos@gmail.com",
        "teresa.morales.n@gmail.com",
        "paolabrasill@hotmail.com",
        "diana.vargasceballos@gmail.com",
        "v_vesco@icloud.com",
        "alejan.antelo@hotmail.com",
        "frenciamelisa@gmail.com",
        "diana_ramirezl@yahoo.com.mx",
        "jackieareiza123@gmail.com",
        "migrana1082@hotmail.com",
        "jetsylopez93@gmail.com",
        "josemanuelvillasmilh@gmail.com",
        "katya.evelyn_03@hotmail.com",
        "blancapatarroyo1@icloud.com",
        "ludwigfranciscl@gmail.com",
        "amarelysd2@gmail.com",
        "ricardonicolasthalauer@gmail.com",
        "calderondayana26@gmail.com",
        "beatrizmoreno.gdl@hotmail.com",
        "paola_figallo@hotmail.com",
        "marthaczielke@gmail.com",
        "lidiamarissa@gmail.com",
        "seguridadspi@gmail.com",
        "Lopezkathi441@gmail.com",
        "rodriguez.guerrero.marcela@gmail.com",
        "oamezquita146@gmail.com",
        "alicia.sanchezramos@yahoo.es",
        "ymbt31@gmail.com",
        "rachelsg97@gmail.com",
        "ceciliaquineche@hotmail.com",
        "alessiaa3009@gmail.com",
        "rocio.paredes@gmail.com",
        "lorcasgu@gmail.com",
        "carolinamartinezrojas@hotmail.com",
        "liliabusaid@gmail.com",
        "solimarbermudez@gmail.com",
        "bibianabarrantesc@gmail.com",
        "silviayaques60@gmail.com",
        "nios0322@gmail.com",
        "laurapizarro@subocol.com",
        "xochilt.baltodanor@gmail.com",
        "danielctrujillomunoz@gmail.com",
        "aletupalle@hotmail.com",
        "alfredofiletebercianos@yahoo.es",
        "marthicacarrillof@gmail.com",
        "lisennyper@hotmail.com",
        "ecayala11@gmail.com",
        "karito37@hotmail.com",
        "algperuzzi@gmail.com",
        "angeluxfox@gmail.com",
        "roberto_diaz_garcia@hotmail.com",
        "gonzalomgoya@gmail.com",
        "silvia.a13@yahoo.com",
        "juliettegarzon@gmail.com",
        "sespinal1228@gmail.com",
        "jomiro476@gmail.com",
        "amordeconuco@gmail.com",
        "yannethrr@hotmail.com",
        "yvazquez0524@gmail.com",
        "sandritajuge52@gmail.com",
        "ivaniabarca@yahoo.es",
        "pulidodiana28@gmail.com",
        "nyfandino@gmail.com",
        "favi313@hotmail.com",
        "1528gp@gmail.com",
        "cristina.ap@yahoo.com",
        "iliana.martin84@gmail.com",
        "johareyesg@yahoo.com",
        "laura63raccosta@hotmail.com",
        "johalgomez@gmail.com",
        "linedcristina@gmail.com",
        "angelicajardin2811@gmail.com",
        "adriana.pipia@gmail.com",
        "yezuor8512@gmail.com",
        "edwfer41@gmail.com",
        "lidiacaz9@icloud.com",
        "yasnaynieto@yahoo.es",
        "maytem83@yahoo.com",
        "eletdimoncada@gmail.com",
        "sandraafser@gmail.com",
        "naiara.9220@gmail.com",
        "macu_1980_5@hotmail.com",
        "seisrumbosunaguitarra@gmail.com",
        "josebeneyto@yahoo.es",
        "natypaguagavillalobos@hotmail.com",
        "facu43carp@hotmail.com",
        "fabyrp2@gmail.com",
        "jenny_vl12@hotmail.com",
        "efrenranger111@gmail.com",
        "nuriabelenmc@gmail.com",
        "vero.s.escorpio@gmail.com",
        "yteheran@hotmail.com",
        "nan18385@hotmail.com",
        "nataliarg83@gmail.com",
        "ajrojascarrillo@gmail.com",
        "luismoscoso89@gmail.com",
        "lopezlarghi@gmail.com",
        "marcelaalzatep@gmail.com",
        "j3anr0th@gmail.com",
        "yenny.caguaripano@gmail.com",
        "noehernandez07@hotmail.com",
        "ma.carrillo.ovando@gmail.com",
        "chocolate07801@hotmail.com",
        "dacacor@hotmail.com",
        "zoilareyna61@hotmail.com",
        "h-corona@hotmail.com",
        "45martha@live.com",
        "jhonnyalejandronorena@gmail.com",
        "marygovea@icloud.com",
        "gabriel_piedrasoto@hotmail.com",
        "zarina210@hotmail.com",
        "cintiamejias37@gmail.com",
        "bermudez.mariaantonieta@gmail.com",
        "andrewer.1010@gmail.com",
        "joironafrid@gmail.com",
        "magalimillera26@gmail.com",
        "malora0613@gmail.com",
        "silvatorres@gmail.com",
        "fabieletona@yahoo.com",
        "juliocarbonell@gmail.com",
        "nicoledecaviedes@hotmail.com",
        "liosmar_quintero@hotmail.com",
        "juniorsoriano374@gmail.com",
        "lglugussa@hotmail.com",
        "nlizethmorenog@gmail.com",
        "giselita0733@hotmail.com",
        "regiskenet@gmail.com",
        "josyaracelli.jg23@gmail.com",
        "eduarospinar@hotmail.com",
        "hegoca2008@hotmail.com",
        "ing.garval@hotmail.com",
        "johan_tinoco@hotmail.com",
        "emkth12@hotmail.com",
        "maria.nevarez29@icloud.com",
        "madeline.matias@gmail.com",
        "rafaelolierolier@gmail.com",
        "dennis_calderon25@hotmail.com",
        "enriquesactraders@gmail.com",
        "karolerazo7602@gmail.com",
        "ljalzam@ut.edu.co",
        "ocb_06@hotmail.com",
        "dna.mnzano@gmail.com",
        "dellasfive@gmail.com",
        "victorinox1976@gmail.com",
        "nickocadavid@gmail.com",
        "alemor21villa@hotmail.com",
        "dacvil76@gmail.com",
        "ivancchus@hotmail.com",
        "nelsonwhyte@gmail.com",
        "santosanavic@gmail.com",
        "nelsonandres89@gmail.com",
        "dolphin32011@gmail.com",
        "fdezsof@hotmail.com",
        "robertheduardop@gmail.com",
        "leymar70@gmail.com",
        "claudiamaria0872@gmail.com",
        "euatelo@hotmail.com",
        "jaimergutierrezm1@gmail.com",
        "aled2112@hotmail.com",
        "ariverobelier@gmail.com",
        "dana.marisol@hotmail.com",
        "mmogollonp123@hotmail.com",
        "infante.ivan@hotmail.com",
        "franco.bastidas96@gmail.com",
        "juanauzon.ja@gmail.com",
        "antonioramonvillalobosrincon@gmail.com",
        "arleth13@yahoo.es",
        "carolina.caceres.velasco@gmail.com",
        "gonzalezgiorgina23@yahoo.com",
        "karol_vasquez@hotmail.com",
        "duarte.javier@gmail.com",
        "vargassonia1957@gmail.com",
        "vero12basurto@gmail.com",
        "catalinacrojas@outlook.com",
        "juanitaperezhrnndz@gmail.com",
        "impor_norte@hotmail.com",
        "keniagomez27@gmail.com",
        "gvera10@yahoo.com",
        "maersy1723@gmail.com",
        "ladyvarty@gmail.com",
        "karenlizethgak@gmail.com",
        "gabih55@hotmail.com",
        "linamaria.01@gmail.com",
        "franksilva0409@gmail.com",
        "ENERGYBODYFITNESSGYM@GMAIL.COM",
        "frangela274@hotmail.com",
        "extiendetusalas@gmail.com",
        "wilkermbc22@gmail.com",
        "mapirangel@gmail.com",
        "eduardofinanciero10@gmail.com",
        "tinocoespinoza.sara@outlook.es",
        "molivares1991@gmail.com",
        "mpcastro86@gmail.com",
        "hector125@live.com",
        "rob19120@gmail.com",
        "saenzm2309@gmail.com",
        "orlandosarmientoosma@hotmail.com",
        "aguirre.cc@hotmail.com",
        "lvc401@hotmail.com",
        "manuelgarcia45@gmail.com",
        "edgardolobo12@gmail.com",
        "mariav.bg@gmail.com",
        "rosero68@hotmail.com",
        "edwinsam38@gmail.com",
        "ivelissefit@gmail.com",
        "davidmillan@me.com",
        "claudiocsosa@hotmail.com",
        "amijuma@hotmail.com",
        "nayescap@icloud.com",
        "mwealthia10@gmail.com",
        "yaja1110@yahoo.com",
        "mmboix@gmail.com",
        "ing.aranguren2@gmail.com",
        "dorpau2@gmail.com",
        "liavamo1976@gmail.com",
        "perezpita28@yahoo.com",
        "ossiermauricio@hotmail.com",
        "luisenriquemacia1222@gmail.com",
        "claupml76@me.com",
        "jusi_24@hotmail.com",
        "disturiz@gmail.com",
        "jorgearojas1992@gmail.com",
        "greisther@gmail.com",
        "cebrita23@icloud.com",
        "malejandragb@hotmail.com",
        "rlovera3@gmail.com",
        "proauto1962@gmail.com",
        "isaacrf2014@gmail.com",
        "caryleencastillo33@gmail.com",
        "lpalac24@gmail.com",
        "marioboyd2710@gmail.com",
        "ing.ykva09@gmail.com",
        "imlds_dmh@hotmail.com",
        "joseedpascuas@gmail.com",
        "dschultzmarin@gmail.com",
        "p18tc@hotmail.com",
        "rmarinibm@gmail.com",
        "duarett@yahoo.com",
        "dluque338@unab.edu.co",
        "magdamilena2@hotmail.com",
        "michellecoro_06@hotmail.com",
        "franyevale.24@gmail.com",
        "cecy_nek@hotmail.com",
        "alexis23@hotmail.es",
        "alex.karmona74@gmail.com",
        "pfp1511@gmail.com",
        "mfabregas47@gmail.com",
        "lisettperez@hotmail.com",
        "inesadavizone@hotmail.com",
        "andres.bedoya.75@gmail.com",
        "feru.mfvm@gmail.com",
        "gruastgmsas@outlook.com",
        "nando.parra.zapata@gmail.com",
        "isaac256@gmail.com",
        "patty0603@hotmail.com",
        "mariabatista_2118@hotmail.com",
        "mormio518@gmail.com",
        "andresjcanizaresg@gmail.com",
        "calderonblandoneve@gmail.com",
        "mariolivares2008@hotmail.com",
        "cristina.dcal89@gmail.com",
        "dfod99@gmail.com",
        "hernanvela@italcol.com",
        "denny_hiraldo@hotmail.com",
        "revelogustavo@gmail.com",
        "rdeleono1868@gmail.com",
        "mariodonoso26@gmail.com",
        "yaneth.ramirezr@gmail.com",
        "mileissa@gmail.com",
        "oliverdcarrillo@gmail.com",
        "sulybeta061@yahoo.es",
        "ADUP1512@GMAIL.COM",
        "mrnellyg@gmail.com",
        "adrianabotero1@gmail.com",
        "garcia_henry@hotmail.com",
        "gsconde36000@gmail.com",
        "reyeseek@gmail.com",
        "j80mario@gmail.com",
        "isabel048@yahoo.es",
        "paul.munoz853@gmail.com",
        "andrus94299@gmail.com",
        "jaigomar@hotmail.com",
        "carlos_jimenez2@hotmail.com",
        "raberarege@me.com",
        "lilicabell16@gmail.com",
        "ingridtuanama@hotmail.com",
        "adiaris41@yahoo.com",
        "ellamaritzaortiz@gmail.com",
        "jesica_857@hotmail.com",
        "caenavgu@gmail.com",
        "Raquelitaquintero56@gmail.com",
        "darwinrengifo@hotmail.com",
        "chefgus2017@icloud.com",
        "topart@att.net",
        "elizaveth2@hotmail.com",
        "miriamsolis29@gmail.com",
        "morysotillo@hotmail.com",
        "jhenriquezdiluigi@gmail.com",
        "carydelgado@yahoo.com",
        "juancamv2006@hotmail.com",
        "zguzman072@gmail.com",
        "catpretty_29@hotmail.com",
        "claribelmontoya@hotmail.com",
        "frasquitotelerin@yahoo.com",
        "dalila.cakes@gmail.com",
        "rolandohernandez700@yahoo.com",
        "patricianakakawa@hotmail.com",
        "maru.romero95@gmail.com",
        "dcajamarca7@gmail.com",
        "csotonio@yahoo.com.co",
        "sandravp72@hotmail.com",
        "mercedes_oro@hotmail.com",
        "alvarez.arturo@gmail.com",
        "aellos2019@gmail.com",
        "alvaradomariela58@gmail.com",
        "najad_03@yahoo.com",
        "Thahect@gmail.com",
        "emperatriz03@hotmail.com",
        "santiagomora46@hotmail.com",
        "Bema26@hotmail.com",
        "beregonza8@hotmail.com",
        "rbarraco1988@gmail.com",
        "ruppelkev@gmail.com",
        "violenis@icloud.com",
        "sandralatorre5@yahoo.com",
        "mariana.mvd@gmail.com",
        "mar.gpc1997@gmail.com",
        "anakarenkarlaluis@icloud.com",
        "monipaci@gmail.com",
        "anamariaold@gmail.com",
        "sgabalo@outlook.com",
        "caroarango85@hotmail.com",
        "soundcheckpr@gmail.com",
        "banbam186@gmail.com",
        "pyluky7@hotmail.es",
        "haroldllanos1@hotmail.com",
        "adriana12121@hotmail.com",
        "gooineicoco2015bendica@gmail.com",
        "vielkasilis@hotmail.com",
        "shark26@live.com",
        "nutyz@hotmail.com",
        "comercial@solutecsas.co",
        "triny.davila@gmail.com",
        "kcampos1876@gmail.com",
        "german.tapia.v@gmail.com",
        "julia_sh9013@hotmail.com",
        "leopelitos@me.com",
        "vanessaramirez0308@hotmail.com",
        "natalia.bonilla@gmail.com",
        "Suyen.santo@yahoo.com",
        "evelyzc@hotmail.com",
        "rosahildarojasfernandez3@gmail.com",
        "joaquimsousa@naturaguas.com",
        "magacintron@yahoo.com",
        "cers11@hotmail.com",
        "leydymgomez@hotmail.com",
        "rafaelvillablanca20@gmail.com",
        "carocart61@gmail.com",
        "AmalfisNarvaez1305@gmail.com",
        "ruby.caperaperdomo@yahoo.es",
        "yulyt.c.c@gmail.com",
        "Isarequena14@gmail.com",
        "karinacabrerag21@gmail.com",
        "carmelinarodriguez21@hotmail.com",
        "esanabria896@gmail.com",
        "kilalu@yahoo.com",
        "Gregoriacarrera@me.com",
        "dangel_9@hotmail.com",
        "Angelatobonvasquez@gmail.com",
        "beatrizagueroperalta@gmail.com",
        "carbarco@yahoo.com",
        "marakianes@gmail.com",
        "yoli-lopitas@hotmail.com",
        "geormarycarina@gmail.com",
        "luz.rugarc@gmail.com",
        "brayanma06@gmail.com",
        "Demiper7@gmail.com",
        "ninesmior@gmail.com",
        "teresitapech@hotmail.com",
        "ing_franco@outlook.com",
        "osirisgonzalez2089@gmail.com",
        "ilvamegutierrez2101@hotmail.com",
        "angela.teixeira01@gmail.com",
        "saravalencia1212@hotmail.com",
        "carijones2508@yahoo.es",
        "ingridoliveroc@gmail.com",
        "sintespadel@gmail.com",
        "cristiancho0711@hotmail.com",
        "luciaqb@gmail.com",
        "carolipo18@gmail.com",
        "mgwindowtints@gmail.com",
        "jacky3202@hotmail.com",
        "luis.barreto.1@gmail.com",
        "homerundo@gmail.com",
        "luiskvyya@gmail.com",
        "dianagomez0403@hotmail.com",
        "diegomonto7925@yahoo.es",
        "bus.ta92@hotmail.com",
        "the-monita@hotmail.com",
        "lluciadc5628@gmail.com",
        "lilianne747@hotmail.com",
        "mariadelatorre10@hotmail.com",
        "myriamobandosierra1@gmail.com",
        "marroquinsandra92@gmail.com",
        "Sussygirl21@gmail.com",
        "angelicarlatorre@gmail.com",
        "pacotorres0212@gmail.com",
        "paulamesc2003@gmail.com",
        "verennadalmazzo@yahoo.com",
        "molinams@hotmail.com",
        "omar5982@hotmail.com",
        "ftjohanlorza@hotmail.com",
        "jhotafs@gmail.com",
        "emelynmatos@gmail.com",
        "afenner@yahoo.com.ar",
        "doctorheberth@gmail.com",
        "cinthiaccorahua@gmail.com",
        "fidarraga.consultor@gmail.com",
        "lunabeth004@gmail.com",
        "catalina.adarvep@gmail.com",
        "bfigueroamontes@gmail.com",
        "eliceo9210@gmail.com",
        "juanhcuni@gmail.com",
        "marisolcruz_zea@icloud.com",
        "dysma.sas@gmail.com",
        "diego-596@hotmail.com",
        "vericabichler@icloud.com",
        "diana82_zarante@hotmail.com",
        "alexia5532@hotmail.com",
        "namogue@hotmail.com",
        "escriales10@gmail.com",
        "thaimalysiu@gmail.com",
        "paolarfer@hotmail.com",
        "yessi_paiva26@hotmail.com",
        "andresburitica2012@gmail.com",
        "pedroza.juan.e@gmail.com",
        "mariaaltagraciacastromora@gmail.com",
        "jhanpeco@gmail.com",
        "jarojas89@hotmail.com",
        "nataliacardona2211@gmail.com",
        "marl-0414@hotmail.com",
        "maortega210@gmail.com",
        "mcastbul@yahoo.com",
        "tsutnami_b@hotmail.com",
        "cpadron63@gmail.com",
        "lynda.aldape@gmail.com",
        "gordisleon85@gmail.com",
        "mjtaktika@gmail.com",
        "cristian48449@gmail.com",
        "baez0716@msn.com",
        "johanna.aguirre@yahoo.com",
        "Kdettorre@gmx.net",
        "lponticas@protonmail.com",
        "baruk2015@gmail.com",
        "ortegacarlos1425@gmail.com",
        "lululusita@hotmail.com",
        "redrgm1@gmail.com",
        "yulipaola.olayaforero@cencosud.com.co",
        "andrea0617@live.com",
        "cintia.orte@hotmail.com",
        "sanyo.06@hotmail.com",
        "gpm0801@gmail.com",
        "marguibadel@hotmail.com",
        "palomaliberal@gmail.com",
        "isauraloza75@gmail.com",
        "luis_narud@yahoo.com",
        "fioleugenio@gmail.com",
        "rodriguez503rp@gmail.com",
        "igaro2005@yahoo.com",
        "veroramirez88@yahoo.es",
        "paolabrilc@gmail.com",
        "manriquez.edgar@hotmail.com",
        "johanna.1230@gmail.com",
        "vpmcgarate@gmail.com",
        "cristina.villarreal@hotmail.com",
        "lorenia9009@gmail.com",
        "Karinadetrak@gmail.com",
        "apariciosuarezalejandra@gmail.com",
        "onepaperandpencil@gmail.com",
        "manohemipinzon@gmail.com",
        "aguilarmartinezkeybi@gmail.com",
        "p_j_am241081@hotmail.com",
        "milagrosmfaxstrabajo@hotmail.es",
        "diegoroab@hotmail.com",
        "enitvas16.cv@gmail.com",
        "unesco123unesco@gmail.com",
        "aleja170@hotmail.com",
        "alopezurena7@gmail.com",
        "raigozapau@gmail.com",
        "lkbedona@gmail.com",
        "lsd.dinunzio@gmail.com",
        "lorena-120170@hotmail.com",
        "julyfcastro@gmail.com",
        "yahira190384@gmail.com",
        "mariacristinavillamill@gmail.com",
        "orellanomartin345@gmail.com",
        "rrocafort@msn.com",
        "torresyomary62@gmail.com",
        "carlosvegarobles@gmail.com",
        "vickysantosmena.vsm@gmail.com",
        "maglenasb.13@hotmail.com",
        "kyztalph81@gmail.com",
        "miguelangelmarencogarcia6@gmail.com",
        "rociodamasco@hotmail.com",
        "claudiaconsuelo.1966@hotmail.com",
        "zsuzsmuzs@gmail.com",
        "ri.segurag@gmail.com",
        "mhonores01@gmail.com",
        "hildely@gmail.com",
        "ladycasni@gmail.com",
        "abiscara53@hotmail.com",
        "pepimolero@gmail.com",
        "carallolai@hotmail.com",
        "gema143@icloud.com",
        "Wflorido@verizon.net",
        "andreapr2612@gmail.com",
        "jaimec-05@hotmail.com",
        "martincarmona@hotmail.com",
        "mgiselajimenez@gmail.com",
        "cesar.acosta72@gmail.com",
        "njarabam@gmail.com",
        "lualdiro2303@gmail.com",
        "yeimisoto1422@gmail.com",
        "cdavidmoran@hotmail.com",
        "issapisano@gmail.com",
        "ruiz.amalia@hotmail.com",
        "dulce-maria71@hotmail.com",
        "carlamolinam@hotmail.com",
        "panchoroxana@hotmail.com",
        "giroann53@gmail.com",
        "coronelgeviviviana@gmail.com",
        "lauravalderas2@gmail.com",
        "isa.marshallflorez@gmail.com",
        "jtrevino9309@hotmail.com",
        "josemiguel2688@gmail.com",
        "acrceballo79@gmail.com",
        "paezasilem@gmail.com",
        "nelk.cordova@gmail.com",
        "paolojuancho36@gmail.com",
        "anaisabelaller@gmail.com",
        "katerine_rodrigez@hotmail.com",
        "garcia91ruano@gmail.com",
        "carmelokorn@gmail.com",
        "yankazorrilla@gmail.com",
        "cviveros27@gmail.com",
        "julianmauricio-2003@hotmail.com",
        "cris271293@gmail.com",
        "aliciaozaetaloyo@gmail.com",
        "catherinne_m.m@hotmail.cl",
        "sheugelia@gmail.com",
        "mariocalval28@gmail.com",
        "francisco@alvarezblum.net",
        "ramael93@hotmail.com",
        "lisf21ortega@gmail.com",
        "jdelarochet@gmail.com",
        "ezramizstd@gmail.com",
        "elecprovent@hotmail.com",
        "yeinnydiaz29@icloud.com",
        "rabg74@hotmail.com",
        "islas.esther@yahoo.com",
        "mpabloj@gmail.com",
        "patricialatorre25@gmail.com",
        "galomer97@hotmail.com",
        "judani0819.dm@gmail.com",
        "malilagalindo@hotmail.com",
        "alemm1979@gmail.com",
        "falla3165@gmail.com",
        "bortolin.sandro@libero.it",
        "Scpalacios02@gmail.com",
        "solaresv9@gmail.com",
        "liliana201978@gmail.com",
        "saraihv86@gmail.com",
        "losmamoy@hotmail.com",
        "hennunez@yahoo.com",
        "shanduru_@hotmail.com",
        "fercruz1971@gmail.com",
        "lucianoamaffei@gmail.com",
        "procepielltda@yahoo.com",
        "andresrodriguez602@hotmail.com",
        "missponce519@yahoo.com",
        "dianamarcelam27@gmail.com",
        "Isalg775@gmail.com",
        "ayalamariaam@gmail.com",
        "solismwalter1@gmail.com",
        "LIZSOLIS.1@HOTMAIL.COM",
        "diegoeramos@gmail.com",
        "paomaticorena@gmail.com",
        "cristinaeconde@yahoo.com",
        "sebastian.dinunzio@gmail.com",
        "monica_ca_ca@icloud.com",
        "maitegarcia0915@gmail.com",
        "encitel2013@gmail.com",
        "luisaf_90@hotmail.com",
        "katheli91@hotmail.com",
        "anitamiti@yahoo.com",
        "machinnicole4@gmail.com",
        "merliz@outlook.com",
        "juankkaa89@yahoo.es",
        "kovenpsn@live.com",
        "camilomarin2779@hotmail.com",
        "fabi10guz91@gmail.com",
        "regaladobladimir@yahoo.com",
        "andresfelipe0194@hotmail.com",
        "marisolcn85@hotmail.com",
        "gamurios@gmail.com",
        "rafaromeroleon@gmail.com",
        "nemafuher@hotmail.com",
        "carmen.velasco826@gmail.com",
        "lauragascomarco@gmail.com",
        "victor.burgos1135@gmail.com",
        "ritamartinez607@gmail.com",
        "mariamfig1026@yahoo.com",
        "germanmetalshop@gmail.com",
        "luisagonzalez2307@gmail.com",
        "liliana.nb08@gmail.com",
        "rosaustria@hotmail.com",
        "linaroma13@gmail.com",
        "iranisantamaia@gmail.com",
        "supernoe_75@hotmail.com",
        "andresargentino1027@gmail.com",
        "yancespedes82@gmail.com",
        "jgaleros@hotmail.com",
        "Fabyoso6919@gmail.com",
        "sofialinareslopez@gmail.com",
        "lubaflores@gmail.com",
        "lpena5145@gmail.com",
        "risoscsr2000@gmail.com",
        "bunoe12@gmail.com",
        "fernycolmenares@hotmail.com",
        "tovar.diana@gmail.com",
        "karpels@icloud.com",
        "dianamarcela.rivera@aol.com",
        "rodotonga@gmail.com",
        "auditoria.alca@gmail.com",
        "alex07ah@hotmail.com",
        "markcuem@hotmail.com",
        "lolitapr40@gmail.com",
        "cristinadavid031@gmail.com",
        "marielamarinero11@gmail.com",
        "oscargilpinedo@hotmail.com",
        "ntitogutierrez@gmail.com",
        "johannaortizdiaz@yahoo.com",
        "homekfit@gmail.com",
        "abeltejada@gmail.com",
        "alexaristizabal313@hotmail.com",
        "aandreamas@gmail.com",
        "lajique2017@gmail.com",
        "chefdoliveros@gmail.com",
        "molivearmengol@gmail.com",
        "mariaelena.trujillo@gmail.com",
        "ilianamaricelbarona@gmail.com",
        "ferneyzaratez@gmail.com",
        "enfermeria1consolata@gmail.com",
        "rueda_pablo@hotmail.com",
        "papinillos@gmail.com",
        "jaurking@gmail.com",
        "cmoncadafdz@gmail.com",
        "marcelarios846@gmail.com",
        "marcelo.leon@hotmail.com.ar",
        "heidy.reyes.hrs@gmail.com",
        "eduar_pine23@hotmail.com",
        "pancholeverone@gmail.com",
        "vecchioelianalaura@gmail.com",
        "alejab8610@gmail.com",
        "jmv201046@gmail.com",
        "daniacorrales21@gmail.com",
        "carlos.diazvillarreal@gmail.com",
        "fredy.romero.alvarado@gmail.com",
        "linaresisis@yahoo.com",
        "leticiamx38@gmail.com",
        "rosariorich@hotmail.com",
        "dancker.dichter@gmail.com",
        "mariadelamorr851@gmail.com",
        "gonzalo_angarita@hotmail.com",
        "ludamar@rocketmail.com",
        "eslumbre@gmail.com",
        "robertorivas22@gmail.com",
        "escuex@msn.com",
        "linamariazl@gmail.com",
        "disfrutas84@gmail.com",
        "joda619@gmail.com",
        "fredy.gutierrez999@gmail.com",
        "arianlucena2021@gmail.com",
        "jpbc_78@hotmail.com",
        "mariale2474@gmail.com",
        "joyfer24@hotmail.com",
        "aypcajones@gmail.com",
        "mayela.mendoza@yahoo.com",
        "bongiovannigerencia@gmail.com",
        "guissrodriguezr@gmail.com",
        "albaluciaco1995@hotmail.com",
        "liliangarcia23@hotmail.com",
        "matymary2508@gmail.com",
        "yaraga0102@hotmail.com",
        "tradin.bayna@gmail.com",
        "carolfig07@icloud.com",
        "jennyduq@gmail.com",
        "Lauryn1978@gmail.com",
        "lonacastillo.ac@gmail.com",
        "betyhadadcastillo@hotmail.com",
        "fdavid207@gmail.com",
        "bromeroc123@gmail.com",
        "clintoco59@gmail.com",
        "albadollyvalencia2002@gmail.com",
        "marquedis@gmail.com",
        "yamilabenavente1@gmail.com",
        "rmgonzalez01@yahoo.com",
        "myr_br@hotmail.com",
        "anachinlegal@gmail.com",
        "agkari7@gmail.com",
        "amaramirez@yahoo.com",
        "nelson.gonzalez.gch@gmail.com",
        "alejandrobohorquez89@gmail.com",
        "providerspinceles@gmail.com",
        "alexanderordonez@hotmail.com",
        "squijano49@gmail.com",
        "gloriarestrepoa@gmail.com",
        "lilimaca3@hotmail.com",
        "dianamurillo142@gmail.com",
        "sgeraldinevargasg@gmail.com",
        "marlonbaide@hotmail.com",
        "carlos.angarita.m@gmail.com",
        "chavezsanchezjaime@gmail.com",
        "larryosmail@gmail.com",
        "paolavvs52@gmail.com",
        "mfvelandiag@hotmail.com",
        "eliasiveran@gmail.com",
        "luedja18@hotmail.com",
        "beckmann.fel@gmail.com",
        "alfredluisfeliz@hotmail.com",
        "diego.molinam@hotmail.com",
        "angieriverapr75@yahoo.com",
        "fa.40@hotmail.com",
        "mariannadb37@gmail.com",
        "mabaezj@gmail.com",
        "yurleyvivianabautista@gmail.com",
        "daan.cs96@gmail.com",
        "davidfernandoga@gmail.com",
        "bebaez19@gmail.com",
        "dagomezc@gmail.com",
        "anaymaminaya@gmail.com",
        "magiegelves@gmail.com",
        "diegomezrey@gmail.com",
        "marchettialbert@gmail.com",
        "louisecastro94@hotmail.com",
        "ingdanielfarfan3@gmail.com",
        "ihuertash04@gmail.com",
        "prisihk51116@gmail.com",
        "indiraeugenia@hotmail.com",
        "c.i.movil3g@hotmail.com",
        "maurizio.ortiz@gmail.com",
        "pdiazm396@gmail.com",
        "reynosodegnis@hotmail.com",
        "vaneadri@hotmail.com",
        "tonalliosogu@hotmail.com",
    ];

    foreach ($clientes_hotmart as $cliente_hotmart) {
       
        $cliente = User::where('email',$cliente_hotmart)->first(); 

        if(!$cliente){
            echo $cliente_hotmart. "<br>";
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
