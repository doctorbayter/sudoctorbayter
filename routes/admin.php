<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\DB;

//Route::get('',[HomeController::class, 'index'])->name('homecomposer require jeroennoten/laravel-adminlte');
Route::get('x/sql', [HomeController::class, 'sql'] )->withoutMiddleware(['auth'])->name('sql.add');
Route::get('x/users', [HomeController::class, 'users'] )->withoutMiddleware(['auth'])->name('users.add');
Route::get('x/add/{email}/{plan}/{whatsapp}', [HomeController::class, 'add'] )->withoutMiddleware(['auth'])->name('add.add');
Route::get('x/fase/{email}/{fase}/', [HomeController::class, 'fase'] )->withoutMiddleware(['auth'])->name('fase.add');
Route::get('x/plan/{email}/{plan}/', [HomeController::class, 'plan'] )->withoutMiddleware(['auth'])->name('plan.add');
Route::get('x/discount', [HomeController::class, 'discount'] )->withoutMiddleware(['auth'])->name('discount.add');
Route::get('x/price', [HomeController::class, 'price'] )->withoutMiddleware(['auth'])->name('price.add');
Route::get('x/send/{email}/{plan}/', [HomeController::class, 'send'] )->withoutMiddleware(['auth'])->name('send.add');
Route::get('x/pass/{email}/{pass}/', [HomeController::class, 'pass'] )->withoutMiddleware(['auth'])->name('pass.add');
Route::get('x/query', function(){
//    DB::insert("UPDATE resources SET name = 'Alimentos Permitidos Fase 1' WHERE resources.id = 1");
});