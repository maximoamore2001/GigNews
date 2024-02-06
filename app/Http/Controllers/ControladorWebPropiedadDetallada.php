<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;

class ControladorWebPropiedadDetallada extends Controller
{
    public function index()
    {
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
            return view('web.propiedad-detallada' , compact('aSucursales'));
    }
}