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
use App\Http\Middleware\SoloAdminContratos;
use App\Http\Middleware\SoloContratante;
use App\Http\Middleware\SoloFinanzas;

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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/Administrador', [SoloAdminController::class, 'index'])->name(' administrador');
    Route::resource('roles', RolesController::class);
    Route::resource('Empleados', EmpleadosController::class);
    Route::resource('Usuarios', UsuariosController::class);
})->namespace('root');
/*
|--------------------------------------------------------------------------
| Web Routes peticiones
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Peticiones', [SoloPeticionesController::class, 'index'])->name(' Peticiones');

    Route::get('/fclaveCucop', [RequesicionesController::class, 'fclaveCucop'])->name('fclaveCucop');

    Route::resource('Requesiciones', RequesicionesController::class);
    Route::resource('CUCop', CUCoPsController::class);


})->namespace('Peticiones');
/*
|----------------------------------------------------------------- ---------
| Web Routes Contratante
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Contratante', [SoloContratante::class, 'index'])->name(' Contratante');

})->namespace('Contratante');
/*
|----------------------------------------------------------------- ---------
| Web Routes AdminContratos
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/AdminContratos', [SoloAdminContratos::class, 'index'])->name(' AdminContratos');

})->namespace('AdmiNContratos');
/*
|----------------------------------------------------------------- ---------
| Web Routes Finanzas
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Finanzas', [SoloFinanzas::class, 'index'])->name(' Finanzas');

})->namespace('Finanzas');
/*
|----------------------------------------------------------------- ---------
| Web Routes AreaNormatica
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Anormativa', [SoloFinanzas::class, 'index'])->name(' Anormativa');

})->namespace('Anormativa');
