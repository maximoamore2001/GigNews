<?php

namespace App\Http\Controllers;

use App\entidades\Producto;
use App\entidades\propiedad;
use App\entidades\sucursal;
use App\entidades\tipo_producto;
use App\entidades\tipo_propiedad;

class ControladorWebPropiedad extends Controller
{
      public function index()
      {
        
            $titulo = "Listado de categorias";
    
            $producto = new propiedad();
            $aProductos = $producto->obtenerTodos();
    
            $categoria = new tipo_propiedad();
            $aCategorias = $categoria->obtenerTodos();
    
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
    
            return view("web.propiedad", compact("aSucursales", 'aCategorias', 'aProductos'));
      }
}
