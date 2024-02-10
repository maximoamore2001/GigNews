<?php

namespace App\Http\Controllers;
use App\entidades\sucursal;
use App\entidades\carrito;
use App\entidades\categoria;
use App\entidades\Imagen;
use App\Entidades\propiedad;
use App\entidades\tipo_propiedad;
use Illuminate\Http\Request;
use Session;
require app_path() . '/start/constants.php';


class ControladorWebPropiedadDetallada extends Controller
{
    public function index()
    {
        
        $titulo = "Listado de categorias";

        $imagenes = new Imagen();
        $aImagenes = $imagenes->obtenerTodos(); 

        $propiedad = new propiedad();
        $aPropiedades = $propiedad->obtenerTodos(); 

        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view("web.propiedad-detallada", compact("titulo", "aCategorias", "aPropiedades" , "aSucursales", "aImagenes"));
    }


    public function ver($idpropiedad)
    {
                $titulo = "ver de producto";

                $producto = new propiedad();
                $producto->obtenerPorId($idpropiedad);


                $categoria = new categoria();
                $categoria->obtenerPorId($idpropiedad);



                $propiedad = new propiedad();
                $aPropiedades = $propiedad->obtenerTodos(); 

                return view("web.propiedad-detallada", compact("titulo", "producto", "categoria", "aPropiedades"));
            
    }

    
}
