<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\UserRecipe;
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

Route::get('query', function(){
    DB::insert("INSERT INTO day_fase (id, fase_id, day_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', CURRENT_TIMESTAMP, NULL), (4, '1', '4', CURRENT_TIMESTAMP, NULL), (5, '1', '5', CURRENT_TIMESTAMP, NULL), (6, '1', '6', CURRENT_TIMESTAMP, NULL), (7, '1', '7', CURRENT_TIMESTAMP, NULL), (8, '1', '8', CURRENT_TIMESTAMP, NULL), (9, '1', '9', CURRENT_TIMESTAMP, NULL), (10, '1', '10', CURRENT_TIMESTAMP, NULL), (11, '1', '11', CURRENT_TIMESTAMP, NULL), (12, '1', '12', CURRENT_TIMESTAMP, NULL), (13, '1', '13', CURRENT_TIMESTAMP, NULL), (14, '1', '14', CURRENT_TIMESTAMP, NULL), (15, '1', '15', CURRENT_TIMESTAMP, NULL), (16, '1', '16', CURRENT_TIMESTAMP, NULL), (17, '1', '17', CURRENT_TIMESTAMP, NULL), (18, '1', '18', CURRENT_TIMESTAMP, NULL), (19, '1', '19', CURRENT_TIMESTAMP, NULL), (20, '1', '20', CURRENT_TIMESTAMP, NULL), (21, '1', '21', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_week (id, day_id, week_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '2', '1', CURRENT_TIMESTAMP, NULL), (3, '3', '1', CURRENT_TIMESTAMP, NULL), (4, '4', '1', CURRENT_TIMESTAMP, NULL), (5, '5', '1', CURRENT_TIMESTAMP, NULL), (6, '6', '1', CURRENT_TIMESTAMP, NULL), (7, '7', '1', CURRENT_TIMESTAMP, NULL), (8, '8', '2', CURRENT_TIMESTAMP, NULL), (9, '9', '2', CURRENT_TIMESTAMP, NULL), (10, '10', '2', CURRENT_TIMESTAMP, NULL), (11, '11', '2', CURRENT_TIMESTAMP, NULL), (12, '12', '2', CURRENT_TIMESTAMP, NULL), (13, '13', '2', CURRENT_TIMESTAMP, NULL), (14, '14', '2', CURRENT_TIMESTAMP, NULL), (15, '15', '3', CURRENT_TIMESTAMP, NULL), (16, '16', '3', CURRENT_TIMESTAMP, NULL), (17, '17', '3', CURRENT_TIMESTAMP, NULL), (18, '18', '3', CURRENT_TIMESTAMP, NULL), (19, '19', '3', CURRENT_TIMESTAMP, NULL), (20, '20', '3', CURRENT_TIMESTAMP, NULL), (21, '21', '3', CURRENT_TIMESTAMP, NULL);
    ");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (1, '1', '2', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES (1, 'Lista de Alimentos Fase 1', 'files/pdf/lista-de-alimentos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL), (2, 'Secretos Fase 1', 'files/pdf/secretos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (1, '2', '1', CURRENT_TIMESTAMP, NULL)");

    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (2, '2', '2', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (2, '1', '2', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (3, '2', '3', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (3, '1', '3', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (4, '2', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (4, '1', '4', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (5, '2', '5', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (5, '1', '5', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (6, '2', '6', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (6, '1', '6', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (7, '2', '7', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (7, '1', '7', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (8, '2', '8', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (8, '1', '8', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (9, '2', '9', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (9, '1', '9', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (10, '2', '10', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (10, '1', '10', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (11, '2', '11', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (11, '1', '11', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (12, '2', '12', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (12, '1', '12', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (13, '2', '13', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (13, '1', '13', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (14, '2', '14', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (14, '1', '14', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (15, '2', '15', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (15, '1', '15', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (16, '2', '16', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (16, '1', '16', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (17, '2', '17', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (17, '1', '17', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (18, '2', '18', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (18, '1', '18', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (19, '2', '19', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (19, '1', '19', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (20, '2', '20', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (20, '1', '20', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (21, '2', '21', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (21, '1', '21', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (22, '2', '22', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (22, '1', '22', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (23, '2', '23', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (23, '1', '23', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (24, '2', '24', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (24, '1', '24', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (25, '2', '25', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (25, '1', '25', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (26, '2', '26', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (26, '1', '26', CURRENT_TIMESTAMP, NULL)");

    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (27, '2', '27', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (27, '1', '27', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (28, '2', '28', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (28, '1', '28', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (29, '2', '29', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (29, '1', '29', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (30, '2', '30', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (30, '1', '30', CURRENT_TIMESTAMP, NULL)");


    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (31, '2', '31', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (31, '1', '31', CURRENT_TIMESTAMP, NULL)");




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

});