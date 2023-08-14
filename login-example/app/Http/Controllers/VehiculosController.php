<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculos;

class VehiculosController extends Controller
{
    //
    public function index(){
        return Vehiculos::all();
    }
}
