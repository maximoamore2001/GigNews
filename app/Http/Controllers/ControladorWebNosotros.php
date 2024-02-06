<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;
use App\entidades\postulacion;
use Illuminate\Http\Request;

class ControladorWebNosotros extends Controller
{
    public function index()
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();
        return view("web.Nosotros", compact("aSucursales"));
    }

    public function insertarPostulacion(request $request)
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $postulacion = new postulacion();
        $postulacion->nombre = $request->input("txtNombre");
        $postulacion->apellido = $request->input("txtApellido");
        $postulacion->whatsapp = $request->input("txtWhatsapp");
        $postulacion->correo = $request->input("txtCorreo");
        $postulacion->linkcv = $request->input("archivoCv");


        if ($_FILES["archivoCv"]["error"] === UPLOAD_ERR_OK) {
            $extension = pathinfo($_FILES["archivoCv"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ymdhmsi") . ".$extension";
            $archivoCv = $_FILES["archivoCv"]["tmp_name"];

            if ($extension == "doc" || $extension == "docx" || $extension == "pdf") {
                move_uploaded_file($archivoCv, env('APP_PATH') . "/public/files/$nombre");
            } else {
                return "";
            }

            $postulacion->linkcv = $nombre;
        }

        $postulacion->insertar();

        return view("web.postulacion-gracias", compact("aSucursales"));
    }
}
