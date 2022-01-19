<?php

use App\Http\Controllers\usuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ROTAS PARA USUARIO
Route::post('login',[usuarioController::class,'login']);
Route::get('usuario',[usuarioController::class,'showAll']);
Route::get('usuario/{id}',[usuarioController::class,'show']);
Route::post('usuario',[usuarioController::class,'store']);
Route::put('usuario/{id}',[usuarioController::class,'update']);
Route::delete('usuario/{id}',[usuarioController::class,'destroy']);