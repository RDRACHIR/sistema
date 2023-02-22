<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/empleado', function () {
//     return view('empleado.index');
// });

// // Accediento a la clase empleado 
// Route::get('/empleado/create', [EmpleadoController::class, 'create']);

// Automatizar las solicitudes y mostrar todoas las vistas`
//Con middleware('auth') se restringen el acceso a las demas paginas a no ser que el usuario realice el login
Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

// Configuracion de rutas para autenticación
Route::group(['middleware' => 'auth'], function () {
  Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});

