<?php

use App\Http\Controllers\ContratosController;
use App\Http\Controllers\CUCoPsController;
use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequesicionesController;
use App\Http\Controllers\RequisicionesFinalizadasController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SoloAdminController;
use App\Http\Controllers\SoloAreaNormativaController;
use App\Http\Controllers\SoloContratanteController;
use App\Http\Controllers\SoloFinanzasController;
use App\Http\Controllers\SoloPeticionesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SoloAdminContratosController;
use App\Http\Controllers\SubirArchivosController;

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
/*
|--------------------------------------------------------------------------
| Web Routes pages of Login and welcome home
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/Registro',function () {
    return view('Registro');
} )->name('Registro');

/*
|--------------------------------------------------------------------------
| Web Routes auth
|--------------------------------------------------------------------------
*/
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
| Web Routes Peticiones
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Peticiones', [SoloPeticionesController::class, 'index'])->name(' Peticiones');

    Route::get('/fclaveCucop', [RequesicionesController::class, 'fclaveCucop'])->name('fclaveCucop');

    Route::resource('Requesiciones', RequesicionesController::class);
    Route::resource('CUCop', CUCoPsController::class);

    Route::post('/subir-archivos', [SubirArchivosController::class, 'subir']);

})->namespace('Peticiones');
/*
|----------------------------------------------------------------- ---------
| Web Routes Contratante
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Contratante', [SoloContratanteController::class, 'index'])->name(' Contratante');
    Route::resource('SeguimientoRequisicion', SeguimientoController::class);
    Route::resource('RequisicionesFinalizadas', RequisicionesFinalizadasController::class);
    Route::resource('Contratos', ContratosController::class);
    Route::get('SeguimientoRequisicion/{id}/edit', [SeguimientoController::class, 'edit'])->name('SeguimientoRequisicion.edit');

})->namespace('Contratante');
/*
|----------------------------------------------------------------- ---------
| Web Routes AdminContratos
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/AdminContratos', [SoloAdminContratosController::class, 'index'])->name(' AdminContratos');

})->namespace('admincontratos');
/*
|----------------------------------------------------------------- ---------
| Web Routes Finanzas
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Finanzas', [SoloFinanzasController::class, 'index'])->name(' Finanzas');

})->namespace('Finanzas');
/*
|----------------------------------------------------------------- ---------
| Web Routes AreaNormatica
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/Anormativa', [SoloAreaNormativaController::class, 'index'])->name(' Anormativa');

})->namespace('Anormativa');
