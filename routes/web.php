<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PerilController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MensajesController;
use App\Models\Permission;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::view('/', 'index');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::view('admin','admin.index');

    


    //horarios
    Route::get('horarios', [HorarioController::class, 'index'])->name('horarios');
    Route::post('guardar-horario', [HorarioController::class, 'store'])->name('guardar-horario');


    //perfiles
    Route::get('PerfilDoctor', [PerilController::class, 'doc']);
    Route::get('PerfilAdmin', [PerilController::class, 'admin']);
    Route::get('PerfilRecepcionistaA', [PerilController::class, 'recepcionA']);
    Route::get('PerfilRecepcionistaB', [PerilController::class, 'recepcionB']);

    //Roles
    Route::get('roles', [RoleController::class, 'index']);
    Route::view('crear-rol', 'crear-rol');
    Route::post('crear-rol', [RoleController::class, 'save']);
    Route::post('actualizar-rol/{id}', [RoleController::class, 'update']);
    Route::get('eliminar-rol/{id}', [RoleController::class, 'delete']);
    Route::get('editar-rol/{id}', [RoleController::class, 'edit']);


    //Permissions
    Route::get('permisos', [PermissionController::class, 'index']);
    Route::view('crear-permiso', 'crear-permiso');
    Route::post('crear-permiso', [PermissionController::class, 'save']);
    Route::post('actualizar-permiso/{id}', [PermissionController::class, 'update']);
    Route::get('editar-permiso/{id}', [PermissionController::class, 'edit']);
    Route::get('eliminar-permiso/{id}', [PermissionController::class, 'delete']);

    //Usuarios
    Route::get('usuarios', [UserController::class, 'index']);

    //Grupos
    Route::get('grupos', [GroupController::class, 'index']);
    Route::get('crear-grupo', [GroupController::class, 'save']);

    //Registros de servicios medicos
    Route::get('productos', [ProductoController::class, 'index']);
    Route::get('producto-nuevo', [ProductoController::class, 'create'])->name('crear-producto');
    Route::post('productos', [ProductoController::class, 'store'])->name('guardar-producto');
    Route::get('eliminar-producto/{id}', [ProductoController::class, 'delete']);


    //Usuarios
    Route::get('usuarios', [UserController::class, 'index']);
    Route::get('usuario-nuevo', [UserController::class, 'create'])->name('crear-usuario');
    Route::post('usuarios', [UserController::class, 'store'])->name('guardar-usuario');
    Route::get('eliminar-usuario/{id}', [UserController::class, 'delete']);

    //calendarCitas
    Route::get('citasCalendar', [CitaController::class, 'calendar']);

    //index//paghome
    


    //citas
    Route::get('citas', [CitaController::class, 'index']);
    Route::get('cita-nueva', [CitaController::class, 'create'])->name('crear-cita');
    Route::post('citas', [CitaController::class, 'store'])->name('guardar-cita');
    Route::get('eliminar-cita/{id}', [CitaController::class, 'delete']);
    Route::get('editar-cita/{id}', [CitaController::class, 'edit'])->name('citas.edit');
    Route::put('editar-cita/{id}', [CitaController::class, 'update'])->name('citas.update');


   //mensaje
   Route::get('vermensajes', [MensajesController::class, 'index'])->name('mensajes.index');
   Route::post('/mensajes', [MensajesController::class, 'store'])->name('mensajes.store');

   

    //News
    Route::get('noticias', [App\Http\Controllers\NewsController::class, 'index']);
    Route::get('agregar-noticia', [App\Http\Controllers\NewsController::class, 'addnews']);
    Route::post('guardar-noticia', [App\Http\Controllers\NewsController::class, 'savenews']);
    Route::get('editar-noticia/{id}', [App\Http\Controllers\NewsController::class, 'editnews']);
    Route::post('actualizar-noticia/{id}', [App\Http\Controllers\NewsController::class, 'updatenews']);
    Route::get('eliminar-noticia/{id}', [App\Http\Controllers\NewsController::class, 'deletenews']);
});
