<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\VehiculosController;

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

Route::middleware(['auth:sanctum','role:gerente'])->group(
    function (){
        Route::get('mascotas',[MascotaController::class,"index"]);
        Route::post("logout",[LoginController::class,"logout"]);
        //Route::get('pedidos',[PedidosController::class,"index"]);
        /* Investigar que hace la instruccion NombreClase::class */
        Route::get("vehiculos",[VehiculosController::class,"index"]);
    }
);
Route::middleware(["auth:sanctum","role:cajero|gerente"])->group(
    function(){
        Route::get('pedidos',[PedidosController::class,"index"]);
    }
);

Route::post("login",[LoginController::class,"authenticate"]);