<?php

namespace App\Http\Controllers;

use App\entidades\Imagen;
use App\Entidades\propiedad;
require app_path() . '/start/constants.php';


class ControladorWebPropiedadDetallada extends Controller
{

    public function ver($idpropiedad)
    {
                $producto = new propiedad();
                $producto->obtenerPorId($idpropiedad);

                $imagen = new Imagen();
                $aImagenes = $imagen->obtenerTodos();


                return view("web.propiedad-detallada", compact( "producto", "aImagenes"));
            
    }

    
}
