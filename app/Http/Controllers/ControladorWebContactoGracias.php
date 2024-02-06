<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;

class ControladorWebContactoGracias extends Controller
{
    public function index()
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();
            return view("web.contacto-gracias", compact("aSucursales"));
    }
}