<?php

namespace App\Http\Controllers;
use App\entidades\sucursal;
class ControladorWebPostulacionGracias extends Controller
{
    public function index()
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();
            return view("web.postulacion-gracias", compact("aSucursales"));
    }
}
