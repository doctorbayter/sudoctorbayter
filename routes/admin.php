<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');
Route::resource('recipes', RecipeController::class)->names('recipes');


Route::get('x/sql', [HomeController::class, 'sql'] )->withoutMiddleware(['auth'])->name('sql.add');
Route::get('x/add/{email}/{plan}/', [HomeController::class, 'add'] )->withoutMiddleware(['auth'])->name('add.add');
Route::get('x/fase/{email}/{fase}/', [HomeController::class, 'fase'] )->withoutMiddleware(['auth'])->name('fase.add');
Route::get('x/no-fase/{email}/{fase}/', [HomeController::class, 'noFase'] )->withoutMiddleware(['auth'])->name('fase.remove');
Route::get('x/plan/{email}/{plan}/', [HomeController::class, 'plan'] )->withoutMiddleware(['auth'])->name('plan.add');
Route::get('x/no-plan/{email}/{plan}/', [HomeController::class, 'noPlan'] )->withoutMiddleware(['auth'])->name('plan.remove');
Route::get('x/discount', [HomeController::class, 'discount'] )->withoutMiddleware(['auth'])->name('discount.add');
Route::get('x/price', [HomeController::class, 'price'] )->withoutMiddleware(['auth'])->name('price.add');
Route::get('x/send/{email}/{plan}/', [HomeController::class, 'send'] )->withoutMiddleware(['auth'])->name('send.add');
Route::get('x/pass/{email}/{pass}/', [HomeController::class, 'pass'] )->withoutMiddleware(['auth'])->name('pass.add');
Route::get('x/query', function(){
    //DB::insert("UPDATE resources SET name = 'Alimentos Permitidos Fase 1' WHERE resources.id = 1");
    //php artisan cache:forget spatie.permission.cache
    //php artisan cache:clear
});
