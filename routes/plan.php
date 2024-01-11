<?php

use App\Http\Controllers\Plan\HomeController;
use App\Http\Livewire\Courses;
use App\Http\Livewire\UserBebidas;
use App\Http\Livewire\UserFase;
use App\Http\Livewire\UserFitness;
use App\Http\Livewire\UserFitnessLevel;
use App\Http\Livewire\UserFitnessReseller;
use App\Http\Livewire\UserPlan;
use App\Http\Livewire\UserRecipe;
use App\Http\Livewire\UserSalsitas;
use App\Http\Livewire\UserSnacks;
use App\Http\Livewire\UserWhatsapp;
use Illuminate\Support\Facades\Route;


//Route::get('', UserPlan::class)->name('index');
Route::get('', UserPlan::class)->name('index');
Route::get('dkp', UserPlan::class )->name('dkp');
Route::get('fase/{fase}', UserFase::class)->name('fase');
Route::get('/recipe/{recipe}', UserRecipe::class)->name('recipe');
Route::get('/bebidas', UserBebidas::class )->name('bebidas');
Route::get('/salsitas', UserSalsitas::class )->name('salsas');
Route::get('/snacks', UserSnacks::class )->name('snacks');
Route::get('/whatsapp', UserWhatsapp::class )->name('whatsapp');
Route::get('/tutorial', function(){
    return view('plan.tutorial');
} )->name('tutorial');

Route::get('/biblioteca', function(){
    return view('plan.biblioteca');
} )->name('biblioteca');

Route::get('/total', UserFitness::class )->name('fitness');
Route::get('/total/nivel-{level}', UserFitnessLevel::class )->name('fitness.level');
Route::get('/total/definer/', UserFitnessReseller::class )->name('fitness.reseller');
Route::get('/total/definer/create', [UserFitnessReseller::class, 'create'] )->name('fitness.create');
Route::post('/total/definer/store', [UserFitnessReseller::class, 'store'] )->name('fitness.store');





Route::get('curso/{course}', Courses::class )->name('course.status');
Route::get('curso/{course}/modulo/{lesson}', Courses::class )->name('course.etiquetas');
