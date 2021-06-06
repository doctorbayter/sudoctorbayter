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
    
    DB::insert("INSERT INTO fase_week (id, fase_id, week_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO resources (id, name, url, resourceable_id, resourceable_type, created_at, updated_at) VALUES (1, 'Lista de Alimentos Fase 1', 'lista-de-alimentos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL), (2, 'Secretos Fase 1', 'secretos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO subscriptions (id, plan_id, user_id, created_at, updated_at) VALUES (1, '2', '1', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_plan (id, fase_id, plan_id, created_at, updated_at) VALUES (1, '1', '2', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO fase_user (id, fase_id, user_id, created_at, updated_at) VALUES (1, '1', '1', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '1', '1', '1', CURRENT_TIMESTAMP, NULL), (2, '1', '2', '2', CURRENT_TIMESTAMP, NULL), (3, '1', '3', '3', CURRENT_TIMESTAMP, NULL), (4, '1', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '1', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '2', '6', '1', CURRENT_TIMESTAMP, NULL), (2, '2', '7', '2', CURRENT_TIMESTAMP, NULL), (3, '2', '8', '3', CURRENT_TIMESTAMP, NULL), (4, '2', '5', '4', CURRENT_TIMESTAMP, NULL), (5, '2', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '3', '10', '1', CURRENT_TIMESTAMP, NULL),(2, '3', '11', '2', CURRENT_TIMESTAMP, NULL), (3, '3', '12', '3', CURRENT_TIMESTAMP, NULL), (4, '3', '13', '4', CURRENT_TIMESTAMP, NULL), (5, '3', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '4', '14', '1', CURRENT_TIMESTAMP, NULL), (2, '4', '15', '2', CURRENT_TIMESTAMP, NULL), (3, '4', '16', '3', CURRENT_TIMESTAMP, NULL), (4, '4', '17', '4', CURRENT_TIMESTAMP, NULL), (5, '4', '5', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '5', '18', '1', CURRENT_TIMESTAMP, NULL), (2, '5', '19', '2', CURRENT_TIMESTAMP, NULL), (3, '5', '20', '3', CURRENT_TIMESTAMP, NULL), (4, '5', '21', '4', CURRENT_TIMESTAMP, NULL), (5, '5', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '6', '22', '1', CURRENT_TIMESTAMP, NULL), (2, '6', '23', '2', CURRENT_TIMESTAMP, NULL), (3, '6', '24', '3', CURRENT_TIMESTAMP, NULL), (4, '6', '5', '4', CURRENT_TIMESTAMP, NULL), (5, '6', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '7', '25', '1', CURRENT_TIMESTAMP, NULL), (2, '7', '26', '2', CURRENT_TIMESTAMP, NULL), (3, '7', '27', '3', CURRENT_TIMESTAMP, NULL), (4, '7', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '7', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '8', '29', '2', CURRENT_TIMESTAMP, NULL), (2, '8', '30', '3', CURRENT_TIMESTAMP, NULL), (3, '8', '31', '4', CURRENT_TIMESTAMP, NULL), (4, '8', '32', '4', CURRENT_TIMESTAMP, NULL), (5, '8', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '9', '33', '1', CURRENT_TIMESTAMP, NULL), (2, '9', '34', '2', CURRENT_TIMESTAMP, NULL), (3, '9', '35', '3', CURRENT_TIMESTAMP, NULL), (4, '9', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '9', '9', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '10', '36', '1', CURRENT_TIMESTAMP, NULL), (2, '10', '37', '2', CURRENT_TIMESTAMP, NULL), (3, '10', '38', '3', CURRENT_TIMESTAMP, NULL), (4, '10', '5', '4', CURRENT_TIMESTAMP, NULL), (5, '10', '39', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '11', '40', '1', CURRENT_TIMESTAMP, NULL), (2, '11', '41', '2', CURRENT_TIMESTAMP, NULL), (3, '11', '42', '3', CURRENT_TIMESTAMP, NULL), (4, '11', '43', '4', CURRENT_TIMESTAMP, NULL), (5, '11', '44', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '12', '45', '1', CURRENT_TIMESTAMP, NULL), (2, '12', '46', '2', CURRENT_TIMESTAMP, NULL), (3, '12', '47', '3', CURRENT_TIMESTAMP, NULL), (4, '12', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '12', '32', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '13', '1', '1', CURRENT_TIMESTAMP, NULL), (2, '13', '48', '2', CURRENT_TIMESTAMP, NULL), (3, '13', '49', '3', CURRENT_TIMESTAMP, NULL), (4, '13', '50', '4', CURRENT_TIMESTAMP, NULL), (5, '13', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '14', '51', '1', CURRENT_TIMESTAMP, NULL), (2, '14', '52', '2', CURRENT_TIMESTAMP, NULL), (3, '14', '53', '3', CURRENT_TIMESTAMP, NULL), (4, '14', '54', '4', CURRENT_TIMESTAMP, NULL),(5, '14', '43', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '15', '55', '1', CURRENT_TIMESTAMP, NULL), (2, '15', '56', '2', CURRENT_TIMESTAMP, NULL), (3, '15', '57', '3', CURRENT_TIMESTAMP, NULL), (4, '15', '58', '4', CURRENT_TIMESTAMP, NULL), (5, '15', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '16', '59', '1', CURRENT_TIMESTAMP, NULL), (2, '16', '60', '2', CURRENT_TIMESTAMP, NULL), (3, '16', '61', '2', CURRENT_TIMESTAMP, NULL), (4, '16', '5', '4', CURRENT_TIMESTAMP, NULL), (5, '16', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '17', '62', '1', CURRENT_TIMESTAMP, NULL), (2, '17', '63', '2', CURRENT_TIMESTAMP, NULL), (3, '17', '64', '3', CURRENT_TIMESTAMP, NULL), (4, '17', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '17', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '18', '65', '1', CURRENT_TIMESTAMP, NULL), (2, '18', '66', '2', CURRENT_TIMESTAMP, NULL), (3, '18', '67', '3', CURRENT_TIMESTAMP, NULL), (4, '18', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '18', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '19', '68', '1', CURRENT_TIMESTAMP, NULL), (2, '19', '69', '2', CURRENT_TIMESTAMP, NULL), (3, '19', '16', '3', CURRENT_TIMESTAMP, NULL), (4, '19', '44', '4', CURRENT_TIMESTAMP, NULL), (5, '19', '43', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '20', '70', '1', CURRENT_TIMESTAMP, NULL), (2, '20', '71', '2', CURRENT_TIMESTAMP, NULL), (3, '20', '72', '3', CURRENT_TIMESTAMP, NULL), (4, '20', '4', '4', CURRENT_TIMESTAMP, NULL), (5, '20', '28', '4', CURRENT_TIMESTAMP, NULL)");
    
    DB::insert("INSERT INTO day_recipe (id, day_id, recipe_id, meal, created_at, updated_at) VALUES (1, '21', '45', '1', CURRENT_TIMESTAMP, NULL), (2, '21', '73', '2', CURRENT_TIMESTAMP, NULL), (3, '21', '74', '3', CURRENT_TIMESTAMP, NULL),  (4, '21', '4', '4', CURRENT_TIMESTAMP, NULL),  (5, '21', '28', '4', CURRENT_TIMESTAMP, NULL)");

});