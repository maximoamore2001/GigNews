<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;

class ControladorWebServicios extends Controller
{
    public function index()
    {
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
            return view('web.servicios' , compact('aSucursales'));
    }
}