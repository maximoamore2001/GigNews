<?php

namespace App\Http\Controllers;

use App\entidades\Sistema\Patente;
use App\entidades\Sistema\Usuario;
use App\entidades\imagen;

use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorImagenes extends Controller
{

    public function nuevo()
    {
        $titulo = "Nueva galería";

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("IMAGENESALTA")) {
                $codigo = "IMAGENESSALTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $imagen = new imagen();
                $imagen->obtenerTodos();
                return view("sistema.imagenes-nuevo", compact("titulo", 'imagen'));
            }
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
            $titulo = "Modificar imágenes";
            $entidad = new imagen();
            $entidad->cargarDesdeRequest($request);
        
            // Guardar archivos de imágenes adjuntas
            if (!empty($_FILES["txtImagenes"]["name"])) {
                $imagenes = $_FILES["txtImagenes"];
        
                // Iterar sobre el array de imágenes
                foreach ($imagenes['tmp_name'] as $key => $tmp_name) {
                    // Verificar si hay un error en la subida de la imagen
                    if ($imagenes["error"][$key] === UPLOAD_ERR_OK) {
                        $extension = pathinfo($imagenes["name"][$key], PATHINFO_EXTENSION);
                        $nombre = date("Ymdhmsi") . "_$key.$extension";
                        $archivo = $tmp_name;
                        move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre"); // Guardar el archivo
                        // Guardar el nombre del archivo en la entidad o hacer lo que sea necesario
                        $entidad->imagenes[] = $nombre;
                    }
                }
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

        return view('sistema.imagenes-nuevo', compact('msg', 'imagen', 'titulo',)) . '?id=' . $imagen->idimagenes;
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