<?php

use App\Http\Controllers\Plan\HomeController;
use App\Http\Livewire\UserBebidas;
use App\Http\Livewire\UserFase;
use App\Http\Livewire\UserPlan;
use App\Http\Livewire\UserRecipe;
use App\Http\Livewire\UserSalsitas;
use App\Http\Livewire\UserSnacks;
use Illuminate\Support\Facades\Route;


//Route::get('', UserPlan::class)->name('index');
Route::get('', function () {
    return redirect('/plan/fase/fase-1');
})->name('index');
Route::get('fase/{fase}', UserFase::class)->name('fase');
Route::get('/recipe/{recipe}', UserRecipe::class)->name('recipe');
Route::get('/bebidas', UserBebidas::class )->name('bebidas');
Route::get('/salsitas', UserSalsitas::class )->name('salsas');
Route::get('/snacks', UserSnacks::class )->name('snacks');