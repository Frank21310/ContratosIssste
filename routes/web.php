<?php

use App\Http\Controllers\CUCoPsController;
use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequesicionesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SoloAdminController;
use App\Http\Controllers\SoloPeticionesController;
use App\Http\Controllers\UsuariosController;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes Administrador
|--------------------------------------------------------------------------
*/
Route::group(['middleware'=>['auth']],function(){
    Route::get('/Administrador', [SoloAdminController::class, 'index'])->name(' administrador');
    Route::resource('roles', RolesController::class);
    Route::resource('Empleados', EmpleadosController::class);
    Route::resource('Usuarios', UsuariosController::class);

})->namespace('root');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/Peticiones', [SoloPeticionesController::class, 'index'])->name(' peticiones');
    Route::resource('Requesiciones', RequesicionesController::class);
    Route::resource('CUCop', CUCoPsController::class);


})->namespace('Peticiones');





/*
|----------------------------------------------------------------- ---------
| Web Routes Peticiones
|--------------------------------------------------------------------------
*/


