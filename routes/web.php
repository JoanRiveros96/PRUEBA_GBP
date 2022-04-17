<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodegasController;
use App\Http\Controllers\InventariosController;
use App\Http\Controllers\ProductosController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('bodegas',BodegasController::class);

Route::get('/bodegas', [BodegasController::class,'index']);
Route::post('bodegas/create', [BodegasController::class, 'store']); 
Route::get('/inventario', [InventariosController::class,'inventario']);
Route::post('productos/create',[ProductosController::class,'store']);
Route::post('inventarios/create',[InventariosController::class,'store']);
Route::post('traslado',[InventariosController::class,'traslado']);