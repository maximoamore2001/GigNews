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
        $perPage = 10;
    
        $propiedad = new propiedad();
        $aPropiedades = $propiedad->obtenerTodos($perPage);

        $propiedad_mayor_menor = new propiedad();
        $aPropiedadesMayorMenor = $propiedad_mayor_menor->ordenPrecioMayorMenor($perPage);

        $propiedad_menor_mayor = new propiedad();
        $aPropiedadesMenorMayor = $propiedad_menor_mayor->ordenPrecioMenorMayor($perPage);
    
        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();
    
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();
    
        return view("web.index", compact("aSucursales", 'aCategorias', 'aPropiedades', 'aPropiedadesMayorMenor', 'aPropiedadesMenorMayor'));
    }

}
