<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\UserRecipe;
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

Route::get('link', function(){
    if(file_exists(public_path('storage'))){
        return 'The "public/storage" directory already exists.';
    }

    app('files')->link(
        storage_path('app/public'), public_path('storage')
    );

    return 'The [public/storage] directory has ben linked';
});