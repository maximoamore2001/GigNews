<?php

namespace App\Http\Controllers;

use App\entidades\propiedad;
use App\entidades\sucursal;
use App\entidades\tipo_propiedad;

class ControladorWebHome extends Controller
{
    public function index()
    {
        $titulo = "Listado de propiedades";
    
        // Número de propiedades por página
        $perPage = 5;
    
        $propiedad = new propiedad();
        $aPropiedades = $propiedad->obtenerTodos($perPage);
    
        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();
    
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();
    
        return view("web.index", compact("aSucursales", 'aCategorias', 'aPropiedades'));
    }

}
