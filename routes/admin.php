<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('',[HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name('home');

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
//    DB::insert("UPDATE resources SET name = 'Alimentos Permitidos Fase 1' WHERE resources.id = 1");

    Permission::create([
        'name'=>'Ver Dashboard',
    ]);
    Permission::create([
        'name'=>'Crear Recetas',
    ]);
    Permission::create([
        'name'=>'Leer Recetas',
    ]);
    Permission::create([
        'name'=>'Actualizar Recetas',
    ]);
    Permission::create([
        'name'=>'Eliminar Recetas',
    ]);
    Permission::create([
        'name'=>'Crear Rol',
    ]);
    Permission::create([
        'name'=>'Leer Rol',
    ]);
    Permission::create([
        'name'=>'Actualizar Rol',
    ]);
    Permission::create([
        'name'=>'Eliminar Rol',
    ]);
    Permission::create([
        'name'=>'Leer Usuarios',
    ]);
    Permission::create([
        'name'=>'Actualizar Usuarios',
    ]);
    Permission::create([
        'name'=>'Eliminar Usuarios',
    ]);

    $role = Role::create(['name' => 'Administrador']);
    $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12]);

    $role = Role::create(['name' => 'Editor']);
    $role->syncPermissions(['Leer Recetas', 'Actualizar Recetas']);

    $role = Role::create(['name' => 'Lider']);

    $user = User::find(1);
    $user->assignRole('Administrador');

});

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');
