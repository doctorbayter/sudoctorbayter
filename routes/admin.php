<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

//Route::get('',[HomeController::class, 'index'])->name('homecomposer require jeroennoten/laravel-adminlte');
Route::get('x/sql', [HomeController::class, 'sql'] )->withoutMiddleware(['auth'])->name('sql.add');
Route::get('x/users', [HomeController::class, 'users'] )->withoutMiddleware(['auth'])->name('users.add');
Route::get('x/add/{email}/{plan}/{whatsapp}', [HomeController::class, 'add'] )->withoutMiddleware(['auth'])->name('add.add');
Route::get('x/fase/{email}/{fase}/', [HomeController::class, 'fase'] )->withoutMiddleware(['auth'])->name('fase.add');
Route::get('x/plan/{email}/{plan}/', [HomeController::class, 'plan'] )->withoutMiddleware(['auth'])->name('plan.add');
Route::get('x/query', [HomeController::class, 'query'] )->withoutMiddleware(['auth'])->name('query.add');
Route::get('x/send/{email}/{plan}/', [HomeController::class, 'send'] )->withoutMiddleware(['auth'])->name('send.add');
Route::get('x/pass/{email}/{pass}/', [HomeController::class, 'pass'] )->withoutMiddleware(['auth'])->name('pass.add');