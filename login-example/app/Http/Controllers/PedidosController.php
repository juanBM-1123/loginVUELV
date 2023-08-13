<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
class PedidosController extends Controller
{
    public function index(){
        return Pedidos::all();
    }
}
