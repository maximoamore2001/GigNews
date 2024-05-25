<?php

namespace App\Http\Controllers;

use App\entidades\propiedad;
use App\entidades\sucursal;
use App\entidades\tipo_propiedad;

class ControladorWebBlog extends Controller
{
    public function index()
    {
        $titulo = "Listado de blogs";

        $propiedad = new propiedad();
        $aPropiedades = $propiedad->obtenerTodos();

        $propiedad_mayor_menor = new propiedad();
        $aPropiedadesMayorMenor = $propiedad_mayor_menor->ordenPrecioMayorMenor();

        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view("web.blog", compact("aSucursales", 'aCategorias', 'aPropiedades', 'aPropiedadesMayorMenor'));
    }

}