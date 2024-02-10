<?php

namespace App\Http\Controllers;

use App\entidades\propiedad;
use App\entidades\sucursal;
use App\entidades\tipo_propiedad;

class ControladorWebCasas extends Controller
{
      public function index()
      {
            $imagen = new Imagen();
            $aImagenes = $imagen->obtenerTodos();

            $titulo = "Listado de categorias";
    
            $propiedad = new propiedad();
            $aPropiedades = $propiedad->obtenerTodos(); 
    
            $categoria = new tipo_propiedad();
            $aCategorias = $categoria->obtenerTodos();
    
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
    
            return view("web.Casas", compact("aSucursales", 'aCategorias', 'aPropiedades', 'aImagenes'));
      }
}
