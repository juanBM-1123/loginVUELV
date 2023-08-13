<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PedidosController;

//use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware(['auth:sanctum'])->group(
    function (){
        Route::get('mascotas',[MascotaController::class,"index"]);
        Route::post("logout",[LoginController::class,"logout"]);
        Route::get('pedidos',[PedidosController::class,"index"]);
        /* Investigar que hace la instruccion NombreClase::class */
    }
);
Route::post("login",[LoginController::class,"authenticate"]);