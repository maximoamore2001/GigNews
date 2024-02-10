<?php

namespace App\Http\Controllers;

use App\entidades\Sistema\Patente;
use App\entidades\Sistema\Usuario;
use App\entidades\imagen;
use App\entidades\propiedad;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorImagen extends Controller
{

    public function nuevo()
    {
        $titulo = "Nueva galería";

        if (Usuario::autenticado() == true) {
                $imagen = new imagen();
                $imagen->obtenerTodos();
                
                $propiedad = new propiedad();
                $aPropiedades = $propiedad->obtenerTodos();

                return view("sistema.imagenes-nuevo", compact("titulo", 'imagen', "aPropiedades"));
        } else {
            return redirect('admin/login');
        }
    }

    public function index()
    {

        $titulo = "Listado de imagenes";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("IMAGENESCONSULTA")) {
                $codigo = "IMAGENESCONSULTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.imagenes-listar", compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
        return view("sistema.imagenes-listar", compact('titulo'));
    }


    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar imagen";
            $entidad = new imagen();
            $entidad->cargarDesdeRequest($request);

            //guardar archivo de imágen adjunta
            if ($_FILES["txtImagenes"]["error"] === UPLOAD_ERR_OK) {
                $extension = pathinfo($_FILES["txtImagenes"]["name"], PATHINFO_EXTENSION);
                $nombreimagen = date("Ymdhmsi") . ".$extension" . '7';
                $archivo = $_FILES["txtImagenes"]["tmp_name"];
                move_uploaded_file($archivo, env('APP_PATH') . "/public/files/galeria/$nombreimagen"); //guardar el archivo
                $entidad->imagen = $nombreimagen;
            }

            //validaciones
            if ($entidad->nombre == "" || $entidad->imagen == "") {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Complete todos los datos";
            } else {
                if ($_POST["id"] > 0) {
                    //Es actualizacion
                    $entidad->guardar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                } else {
                    //Es nuevo
                    $entidad->insertar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                }

                $_POST["id"] = $entidad->idimagenes;
                return view('sistema.imagenes-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idimagenes;
        $imagen = new imagen();
        $imagen->obtenerPorId($id);
        $propiedad = new propiedad();
        $aPropiedades = $propiedad->obtenerTodos();

        return view('sistema.imagenes-nuevo', compact('msg', 'imagen', 'titulo', 'aPropiedades')) . '?id=' . $imagen->idimagenes;
    }

    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new imagen();
        $aImagenes = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aImagenes) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/imagenes/" . $aImagenes[$i]->idimagenes . "'>" . $aImagenes[$i]->nombre . "</a>";
            $row[] = "<img width='200px' src='/files/" . $aImagenes[$i]->imagen . "'>";
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aImagenes), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aImagenes), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($idimagenes)
    {
        $titulo = "Edicion de imagenes";

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("IMAGENESEDITAR")) {
                $codigo = "IMAGENESEDITAR";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $imagen = new imagen();
                $imagen->obtenerPorId($idimagenes);
                return view("sistema.imagenes-nuevo", compact("titulo", "imagen", "aCategorias"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(request $request)
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("IMAGENESELIMINAR")) {
                $resultado["err"] = EXIT_FAILURE;
                $resultado["mensaje"] = "No tiene permisos para la operación.";
            } else {
                    //Sino si.
                    $imagen = new imagen();
                    $imagen->idimagenes = $request->input("id");
                    $imagen->eliminar();
                    $resultado["err"] = EXIT_SUCCESS;
                    $resultado["mensaje"] = "Registro eliminado exitosamente.";
                }
            
        } else {
            $resultado["err"] = EXIT_FAILURE;
            $resultado["mensaje"] = "Usuario no autenticado.";
        }

        return json_encode($resultado);
    }
}