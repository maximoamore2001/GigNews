<?php

namespace App\Http\Controllers;

use App\entidades\propiedad;
use App\entidades\sucursal;
use App\entidades\tipo_propiedad;

class ControladorWebHome extends Controller
{
    public function index()
    {
        $titulo = "Listado de categorias";

        $propiedad = new propiedad();
        $aPropiedades = $propiedad->obtenerTodos();

        $propiedad_mayor_menor = new propiedad();
        $aPropiedadesMayorMenor = $propiedad_mayor_menor->ordenPrecioMayorMenor();

        $propiedad_menor_mayor = new propiedad();
        $aPropiedadesMenorMayor = $propiedad_menor_mayor->ordenPrecioMenorMayor();

        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view("web.index", compact("aSucursales", 'aCategorias', 'aPropiedades', 'aPropiedadesMayorMenor', 'aPropiedadesMenorMayor'));
    }

}
