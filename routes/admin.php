<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('',[HomeController::class, 'index'])->name('homecomposer require jeroennoten/laravel-adminlte');