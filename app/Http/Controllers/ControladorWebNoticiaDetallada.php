<?php

namespace App\Http\Controllers;

use App\entidades\Imagen;
use App\Entidades\blog;
require app_path() . '/start/constants.php';


class ControladorWebNoticiaDetallada extends Controller
{

    public function ver($idblog)
    {
                $blog = new blog();
                $blog->obtenerPorId($idblog);


                return view("web.noticia-detallada", compact( "blog"));
            
    }

    
}