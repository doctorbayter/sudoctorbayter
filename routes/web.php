<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\UserRecipe;
use App\Models\Fase;
use App\Models\Week;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('x/sql', function(){
    
    $fase = Fase::find(1);
    foreach ($fase->weeks as $key => $week){
        //dd($week->pivot->resource);
        dd($week);
    }
 
});

Route::get('x/query', function(){

    DB::insert("UPDATE fase_week SET resource = 'files/pdf/lista-de-alimentos-fase-1-1-dkp.pdf' WHERE fase_week.id = 1");
    DB::insert("UPDATE fase_week SET resource = 'files/pdf/lista-de-alimentos-fase-1-2-dkp.pdf' WHERE fase_week.id = 2");
    DB::insert("UPDATE fase_week SET resource = 'files/pdf/lista-de-alimentos-fase-1-3-dkp.pdf' WHERE fase_week.id = 3");

    /* DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at)VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', CURRENT_TIMESTAMP, NULL), (4, '1', '4', CURRENT_TIMESTAMP, NULL), (5, '1', '5', CURRENT_TIMESTAMP, NULL), (6, '1', '6', CURRENT_TIMESTAMP, NULL), (7, '1', '7', CURRENT_TIMESTAMP, NULL), (8, '1', '8', CURRENT_TIMESTAMP, NULL), (9, '1', '9', CURRENT_TIMESTAMP, NULL), (10, '1', '10', CURRENT_TIMESTAMP, NULL), (11, '1', '11', CURRENT_TIMESTAMP, NULL), (12, '1', '12', CURRENT_TIMESTAMP, NULL), (13, '1', '13', CURRENT_TIMESTAMP, NULL), (14, '1', '14', CURRENT_TIMESTAMP, NULL), (15, '1', '15', CURRENT_TIMESTAMP, NULL), (16, '1', '16', CURRENT_TIMESTAMP, NULL), (17, '1', '17', CURRENT_TIMESTAMP, NULL), (18, '1', '18', CURRENT_TIMESTAMP, NULL), (19, '1', '19', CURRENT_TIMESTAMP, NULL), (20, '1', '20', CURRENT_TIMESTAMP, NULL), (21, '1', '21', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '2', '1', CURRENT_TIMESTAMP, NULL), (3, '3', '1', CURRENT_TIMESTAMP, NULL), (4, '4', '1', CURRENT_TIMESTAMP, NULL), (5, '5', '1', CURRENT_TIMESTAMP, NULL), (6, '6', '1', CURRENT_TIMESTAMP, NULL), (7, '7', '1', CURRENT_TIMESTAMP, NULL), (8, '8', '2', CURRENT_TIMESTAMP, NULL), (9, '9', '2', CURRENT_TIMESTAMP, NULL), (10, '10', '2', CURRENT_TIMESTAMP, NULL), (11, '11', '2', CURRENT_TIMESTAMP, NULL), (12, '12', '2', CURRENT_TIMESTAMP, NULL), (13, '13', '2', CURRENT_TIMESTAMP, NULL), (14, '14', '2', CURRENT_TIMESTAMP, NULL), (15, '15', '3', CURRENT_TIMESTAMP, NULL), (16, '16', '3', CURRENT_TIMESTAMP, NULL), (17, '17', '3', CURRENT_TIMESTAMP, NULL), (18, '18', '3', CURRENT_TIMESTAMP, NULL), (19, '19', '3', CURRENT_TIMESTAMP, NULL), (20, '20', '3', CURRENT_TIMESTAMP, NULL), (21, '21', '3', CURRENT_TIMESTAMP, NULL);
    ");

    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) 
    VALUES (22, '2', '22', CURRENT_TIMESTAMP, NULL), (23, '2', '23', CURRENT_TIMESTAMP, NULL),
    (24, '2', '24', CURRENT_TIMESTAMP, NULL),
    (25, '2', '25', CURRENT_TIMESTAMP, NULL),
    (26, '2', '26', CURRENT_TIMESTAMP, NULL), 
    (27, '2', '27', CURRENT_TIMESTAMP, NULL),
    (28, '2', '28', CURRENT_TIMESTAMP, NULL),
    (29, '2', '29', CURRENT_TIMESTAMP, NULL),
    (30, '2', '30', CURRENT_TIMESTAMP, NULL),
    (31, '2', '31', CURRENT_TIMESTAMP, NULL),
    (32, '2', '32', CURRENT_TIMESTAMP, NULL),
    (33, '2', '33', CURRENT_TIMESTAMP, NULL),
    (34, '2', '34', CURRENT_TIMESTAMP, NULL),
    (35, '2', '35', CURRENT_TIMESTAMP, NULL),
    (36, '2', '36', CURRENT_TIMESTAMP, NULL),
    (37, '2', '37', CURRENT_TIMESTAMP, NULL),
    (38, '2', '38', CURRENT_TIMESTAMP, NULL),
    (39, '2', '39', CURRENT_TIMESTAMP, NULL),
    (40, '2', '40', CURRENT_TIMESTAMP, NULL),
    (41, '2', '41', CURRENT_TIMESTAMP, NULL),
    (42, '2', '42', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at)
    VALUES (22, '22', '1', CURRENT_TIMESTAMP, NULL),
    (23, '23', '1', CURRENT_TIMESTAMP, NULL),
    (24, '24', '1', CURRENT_TIMESTAMP, NULL),
    (25, '25', '1', CURRENT_TIMESTAMP, NULL),
    (26, '26', '1', CURRENT_TIMESTAMP, NULL),
    (27, '27', '1', CURRENT_TIMESTAMP, NULL),
    (28, '28', '1', CURRENT_TIMESTAMP, NULL),
    (29, '29', '2', CURRENT_TIMESTAMP, NULL),
    (30, '30', '2', CURRENT_TIMESTAMP, NULL),
    (31, '31', '2', CURRENT_TIMESTAMP, NULL),
    (32, '32', '2', CURRENT_TIMESTAMP, NULL),
    (33, '33', '2', CURRENT_TIMESTAMP, NULL),
    (34, '34', '2', CURRENT_TIMESTAMP, NULL),
    (35, '35', '2', CURRENT_TIMESTAMP, NULL),
    (36, '36', '3', CURRENT_TIMESTAMP, NULL),
    (37, '37', '3', CURRENT_TIMESTAMP, NULL),
    (38, '38', '3', CURRENT_TIMESTAMP, NULL),
    (39, '39', '3', CURRENT_TIMESTAMP, NULL),
    (40, '40', '3', CURRENT_TIMESTAMP, NULL),
    (41, '41', '3', CURRENT_TIMESTAMP, NULL),
    (42, '42', '3', CURRENT_TIMESTAMP, NULL);
    ");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at)
    VALUES (1, '1', '2', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at)
    VALUES (2, '1', '1', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at)
    VALUES (3, '2', '1', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, created_at, updated_at) 
    VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL),
    (2, '1', '2', CURRENT_TIMESTAMP, NULL),
    (3, '1', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, created_at, updated_at)
    VALUES (4, '2', '1', CURRENT_TIMESTAMP, NULL),
    (5, '2', '2', CURRENT_TIMESTAMP, NULL),
    (6, '2', '3', CURRENT_TIMESTAMP, NULL)");
    
    
    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES (1, 'Lista de Alimentos Fase 1', 'files/pdf/lista-de-alimentos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL), (2, 'Secretos Fase 1', 'files/pdf/secretos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES (3, 'Lista de Alimentos Fase 2', 'files/pdf/lista-de-alimentos-fase-2-dkp.pdf', '2', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL), (4, 'Secretos Fase 2', 'files/pdf/secretos-fase-2-dkp.pdf', '2', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (32, '2', '1', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (2, '1', '2', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (2, '1', '2', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (33, '2', '2', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (3, '1', '3', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (3, '1', '3', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (34, '2', '3', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (4, '1', '4', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (4, '1', '4', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (35, '2', '4', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (5, '1', '5', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (5, '1', '5', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (36, '2', '5', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (6, '1', '6', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (6, '1', '6', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (37, '2', '6', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (7, '1', '7', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (7, '1', '7', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (38, '2', '7', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (8, '1', '8', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (8, '1', '8', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (39, '2', '8', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (9, '1', '9', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (9, '1', '9', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (40, '2', '9', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (10, '1', '10', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (10, '1', '10', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (42, '2', '10', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (11, '1', '11', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (11, '1', '11', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (43, '2', '11', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (12, '1', '12', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (12, '1', '12', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (44, '2', '12', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (13, '1', '13', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (13, '1', '13', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (45, '2', '13', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (14, '1', '14', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (14, '1', '14', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (46, '2', '14', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (15, '1', '15', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (15, '1', '15', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (47, '2', '15', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (16, '1', '16', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (16, '1', '16', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (48, '2', '16', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (17, '1', '17', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (17, '1', '17', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (49, '2', '17', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (18, '1', '18', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (18, '1', '18', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (50, '1', '18', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (19, '1', '19', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (19, '1', '19', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (51, '2', '19', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (20, '1', '20', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (20, '1', '20', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (52, '2', '20', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (21, '1', '21', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (21, '1', '21', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (53, '2', '21', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (22, '1', '22', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (22, '1', '22', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (54, '2', '22', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (23, '1', '23', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (23, '1', '23', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (55, '2', '23', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (24, '1', '24', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (24, '1', '24', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (56, '2', '24', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (25, '1', '25', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (25, '1', '25', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (57, '2', '25', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (26, '1', '26', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (26, '1', '26', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (58, '2', '26', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (27, '1', '27', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (27, '1', '27', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (59, '2', '27', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (28, '1', '28', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (28, '1', '28', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (60, '2', '28', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (29, '1', '29', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (29, '1', '29', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (61, '2', '29', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (30, '1', '30', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (30, '1', '30', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (62, '2', '30', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (31, '1', '31', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (31, '1', '31', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (63, '2', '31', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (32, '1', '32', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (64, '1', '32', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (65, '2', '32', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (33, '1', '33', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (66, '1', '33', CURRENT_TIMESTAMP, NULL)");
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (67, '2', '33', CURRENT_TIMESTAMP, NULL)");



    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '1', '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', '3', CURRENT_TIMESTAMP, NULL), (4, '1', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '1', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (6, '2', '6', '1', CURRENT_TIMESTAMP, NULL), (7, '2', '7', '2', CURRENT_TIMESTAMP, NULL), (8, '2', '8', '3', CURRENT_TIMESTAMP, NULL), (9, '2', '5', '4', CURRENT_TIMESTAMP, NULL), (10, '2', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (11, '3', '10', '1', CURRENT_TIMESTAMP, NULL),(12, '3', '11', '2', CURRENT_TIMESTAMP, NULL), (13, '3', '12', '3', CURRENT_TIMESTAMP, NULL), (14, '3', '13', '4', CURRENT_TIMESTAMP, NULL), (15, '3', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (16, '4', '14', '1', CURRENT_TIMESTAMP, NULL), (17, '4', '15', '2', CURRENT_TIMESTAMP, NULL), (18, '4', '16', '3', CURRENT_TIMESTAMP, NULL), (19, '4', '17', '4', CURRENT_TIMESTAMP, NULL), (20, '4', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (21, '5', '18', '1', CURRENT_TIMESTAMP, NULL), (22, '5', '19', '2', CURRENT_TIMESTAMP, NULL), (23, '5', '20', '3', CURRENT_TIMESTAMP, NULL), (24, '5', '21', '4', CURRENT_TIMESTAMP, NULL), (25, '5', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (26, '6', '22', '1', CURRENT_TIMESTAMP, NULL), (27, '6', '23', '2', CURRENT_TIMESTAMP, NULL), (28, '6', '24', '3', CURRENT_TIMESTAMP, NULL), (29, '6', '5', '4', CURRENT_TIMESTAMP, NULL), (30, '6', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (31, '7', '25', '1', CURRENT_TIMESTAMP, NULL), (32, '7', '26', '2', CURRENT_TIMESTAMP, NULL), (33, '7', '27', '3', CURRENT_TIMESTAMP, NULL), (34, '7', '4', '4', CURRENT_TIMESTAMP, NULL), (35, '7', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (36, '8', '29', '2', CURRENT_TIMESTAMP, NULL), (37, '8', '30', '3', CURRENT_TIMESTAMP, NULL), (38, '8', '31', '4', CURRENT_TIMESTAMP, NULL), (39, '8', '32', '4', CURRENT_TIMESTAMP, NULL), (40, '8', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (41, '9', '33', '1', CURRENT_TIMESTAMP, NULL), (42, '9', '34', '2', CURRENT_TIMESTAMP, NULL), (43, '9', '35', '3', CURRENT_TIMESTAMP, NULL), (44, '9', '4', '4', CURRENT_TIMESTAMP, NULL), (45, '9', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (46, '10', '36', '1', CURRENT_TIMESTAMP, NULL), (47, '10', '37', '2', CURRENT_TIMESTAMP, NULL), (48, '10', '38', '3', CURRENT_TIMESTAMP, NULL), (49, '10', '5', '4', CURRENT_TIMESTAMP, NULL), (50, '10', '39', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (51, '11', '40', '1', CURRENT_TIMESTAMP, NULL), (52, '11', '41', '2', CURRENT_TIMESTAMP, NULL), (53, '11', '42', '3', CURRENT_TIMESTAMP, NULL), (54, '11', '43', '4', CURRENT_TIMESTAMP, NULL), (55, '11', '44', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (56, '12', '45', '1', CURRENT_TIMESTAMP, NULL), (57, '12', '46', '2', CURRENT_TIMESTAMP, NULL), (58, '12', '47', '3', CURRENT_TIMESTAMP, NULL), (59, '12', '4', '4', CURRENT_TIMESTAMP, NULL), (60, '12', '32', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (61, '13', '1', '1', CURRENT_TIMESTAMP, NULL), (62, '13', '48', '2', CURRENT_TIMESTAMP, NULL), (63, '13', '49', '3', CURRENT_TIMESTAMP, NULL), (64, '13', '50', '4', CURRENT_TIMESTAMP, NULL), (65, '13', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (66, '14', '51', '1', CURRENT_TIMESTAMP, NULL), (67, '14', '52', '2', CURRENT_TIMESTAMP, NULL), (68, '14', '53', '3', CURRENT_TIMESTAMP, NULL), (69, '14', '54', '4', CURRENT_TIMESTAMP, NULL),(70, '14', '43', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (71, '15', '55', '1', CURRENT_TIMESTAMP, NULL), (72, '15', '56', '2', CURRENT_TIMESTAMP, NULL), (73, '15', '57', '3', CURRENT_TIMESTAMP, NULL), (74, '15', '58', '4', CURRENT_TIMESTAMP, NULL), (75, '15', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (76, '16', '59', '1', CURRENT_TIMESTAMP, NULL), (77, '16', '60', '2', CURRENT_TIMESTAMP, NULL), (78, '16', '61', '2', CURRENT_TIMESTAMP, NULL), (79, '16', '5', '4', CURRENT_TIMESTAMP, NULL), (80, '16', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (81, '17', '62', '1', CURRENT_TIMESTAMP, NULL), (82, '17', '63', '2', CURRENT_TIMESTAMP, NULL), (83, '17', '64', '3', CURRENT_TIMESTAMP, NULL), (84, '17', '4', '4', CURRENT_TIMESTAMP, NULL), (85, '17', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (86, '18', '65', '1', CURRENT_TIMESTAMP, NULL), (87, '18', '66', '2', CURRENT_TIMESTAMP, NULL), (88, '18', '67', '3', CURRENT_TIMESTAMP, NULL), (89, '18', '4', '4', CURRENT_TIMESTAMP, NULL), (90, '18', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (91, '19', '68', '1', CURRENT_TIMESTAMP, NULL), (92, '19', '69', '2', CURRENT_TIMESTAMP, NULL), (93, '19', '16', '3', CURRENT_TIMESTAMP, NULL), (94, '19', '44', '4', CURRENT_TIMESTAMP, NULL), (95, '19', '43', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (96, '20', '70', '1', CURRENT_TIMESTAMP, NULL), (97, '20', '71', '2', CURRENT_TIMESTAMP, NULL), (98, '20', '72', '3', CURRENT_TIMESTAMP, NULL), (99, '20', '4', '4', CURRENT_TIMESTAMP, NULL), (100, '20', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (101, '21', '45', '1', CURRENT_TIMESTAMP, NULL), (102, '21', '73', '2', CURRENT_TIMESTAMP, NULL), (103, '21', '74', '3', CURRENT_TIMESTAMP, NULL),  (104, '21', '4', '4', CURRENT_TIMESTAMP, NULL),  (105, '21', '28', '4', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (106, '22', '96', '1', CURRENT_TIMESTAMP, NULL), (107, '22', '97', '2', CURRENT_TIMESTAMP, NULL), (108, '22', '98', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (109, '23', '99', '1', CURRENT_TIMESTAMP, NULL), (110, '23', '100', '2', CURRENT_TIMESTAMP, NULL), (111, '23', '101', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (112, '24', '102', '1', CURRENT_TIMESTAMP, NULL), (113, '24', '103', '2', CURRENT_TIMESTAMP, NULL), (114, '24', '104', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (115, '25', '105', '1', CURRENT_TIMESTAMP, NULL), (116, '25', '106', '2', CURRENT_TIMESTAMP, NULL), (117, '25', '107', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (118, '26', '108', '1', CURRENT_TIMESTAMP, NULL), (119, '26', '109', '2', CURRENT_TIMESTAMP, NULL), (120, '26', '110', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (121, '27', '111', '1', CURRENT_TIMESTAMP, NULL),
    (122, '27', '112', '2', CURRENT_TIMESTAMP, NULL),
    (123, '27', '113', '3', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (124, '28', '114', '1', CURRENT_TIMESTAMP, NULL),
    (125, '28', '115', '2', CURRENT_TIMESTAMP, NULL),
    (126, '28', '116', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (127, '29', '117', '1', CURRENT_TIMESTAMP, NULL),
    (128, '29', '118', '2', CURRENT_TIMESTAMP, NULL),
    (129, '29', '119', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (130, '30', '120', '1', CURRENT_TIMESTAMP, NULL),
    (131, '30', '121', '2', CURRENT_TIMESTAMP, NULL),
    (132, '30', '122', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (133, '31', '123', '1', CURRENT_TIMESTAMP, NULL),
    (134, '31', '124', '2', CURRENT_TIMESTAMP, NULL),
    (135, '31', '125', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (136, '32', '126', '1', CURRENT_TIMESTAMP, NULL),
    (137, '32', '127', '2', CURRENT_TIMESTAMP, NULL),
    (138, '32', '128', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (139, '33', '129', '1', CURRENT_TIMESTAMP, NULL),
    (140, '33', '130', '2', CURRENT_TIMESTAMP, NULL),
    (141, '33', '131', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (142, '34', '132', '1', CURRENT_TIMESTAMP, NULL),
    (143, '34', '133', '2', CURRENT_TIMESTAMP, NULL),
    (144, '34', '134', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (145, '35', '10', '1', CURRENT_TIMESTAMP, NULL),
    (146, '35', '135', '2', CURRENT_TIMESTAMP, NULL),
    (147, '35', '27', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (148, '36', '136', '1', CURRENT_TIMESTAMP, NULL),
    (149, '36', '137', '2', CURRENT_TIMESTAMP, NULL),
    (150, '36', '138', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (151, '37', '139', '1', CURRENT_TIMESTAMP, NULL),
    (152, '37', '140', '2', CURRENT_TIMESTAMP, NULL),
    (153, '37', '24', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (154, '38', '141', '1', CURRENT_TIMESTAMP, NULL),
    (155, '38', '142', '2', CURRENT_TIMESTAMP, NULL),
    (156, '38', '143', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (157, '39', '144', '1', CURRENT_TIMESTAMP, NULL),
    (158, '39', '145', '2', CURRENT_TIMESTAMP, NULL),
    (159, '39', '146', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (160, '40', '147', '1', CURRENT_TIMESTAMP, NULL),
    (161, '40', '148', '2', CURRENT_TIMESTAMP, NULL),
    (162, '40', '16', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (163, '41', '149', '1', CURRENT_TIMESTAMP, NULL),
    (164, '41', '150', '2', CURRENT_TIMESTAMP, NULL),
    (165, '41', '151', '3', CURRENT_TIMESTAMP, NULL)
    ");

    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES
    (166, '42', '152', '1', CURRENT_TIMESTAMP, NULL),
    (167, '42', '153', '2', CURRENT_TIMESTAMP, NULL),
    (168, '42', '47', '3', CURRENT_TIMESTAMP, NULL)
    ");
    */
}); 