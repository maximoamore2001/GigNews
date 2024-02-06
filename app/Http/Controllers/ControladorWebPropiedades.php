<?php

namespace App\Http\Controllers;

use App\entidades\Producto;
use App\entidades\sucursal;
use App\entidades\tipo_producto;

class ControladorWebPropiedades extends Controller
{
      public function index()
      {
        
            $titulo = "Listado de categorias";
    
            $producto = new Producto();
            $aProductos = $producto->obtenerTodos();
    
            $categoria = new tipo_producto();
            $aCategorias = $categoria->obtenerTodos();
    
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
    
            return view("web.propiedades", compact("aSucursales", 'aCategorias', 'aProductos'));
      }
}
