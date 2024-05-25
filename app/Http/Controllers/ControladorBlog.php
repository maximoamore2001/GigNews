<?php

namespace App\Http\Controllers;


use App\entidades\Sistema\Patente;
use App\entidades\Sistema\Usuario;

use App\Entidades\blog;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorBlog extends Controller
{
    public function nuevo()
    {
        $titulo = "Nuevo blog";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("BLOGALTA")) {
                $codigo = "BLOGALTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $blog = new blog();
                return view("sistema.blog-nuevo", compact("titulo", 'blog'));
            }
        } else {
            return redirect('admin/login');
        }

    }

    public function index()
    {
        $titulo = "Listado de blogs";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("BLOGCONSULTA")) {
                $codigo = "BLOGCONSULTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.blog-listar", compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }

        return view("sistema.blog-listar", compact('titulo'));
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar blog";
            $entidad = new blog();
            $entidad->cargarDesdeRequest($request);

             //guardar archivo de imágen adjunta
             if ($_FILES["txtImagen"]["error"] === UPLOAD_ERR_OK) {
                $extension = pathinfo($_FILES["txtImagen"]["name"], PATHINFO_EXTENSION);
                $nombre = date("Ymdhmsi") . ".$extension";
                $archivo = $_FILES["txtImagen"]["tmp_name"];
                move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre"); //guardar el archivo
                $entidad->imagen = $nombre;
            }

            //validaciones
            if ($entidad->titulo == "" || $entidad->fecha == "" || $entidad->descripcion == "" || $entidad->imagen == "" || $entidad->segundo_titulo == "" || $entidad->segunda_descripcion == "") {
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

                $_POST["id"] = $entidad->idblog;
                return view('sistema.blog-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idblog;
        $blog = new blog();
        $blog->obtenerPorId($id);

        return view('sistema.blog-nuevo', compact('msg', 'blog', 'titulo')) . '?id=' . $blog->idblog;
    }

    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new blog();
        $aBlogs = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;
        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aBlogs) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/blog/" . $aBlogs[$i]->idblog . "'>" . $aBlogs[$i]->titulo . "</a>";
            $row[] = $aBlogs[$i]->fecha;
            $row[] = $aBlogs[$i]->descripcion;
            $row[] = $aBlogs[$i]->segundo_titulo;
            $row[] = $aBlogs[$i]->segunda_descripcion;
            $row[] = "<img width='100px' src='/files/" . $aBlogs[$i]->imagen . "'>";
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aBlogs), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aBlogs), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($idblog)
    {
        $titulo = "Edición de blog";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("BLOGEDITAR")) {
                $codigo = "BLOGEDITAR";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $blog = new blog();
        $blog->obtenerPorId($idblog);
        return view("sistema.blog-nuevo", compact("titulo", "blog"));
            }
        } else {
            return redirect('admin/login');
        }

    }

    public function eliminar(request $request)
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("BLOGBAJA")) {
                $resultado["err"] = EXIT_FAILURE;
                $resultado["mensaje"] = "No tiene permisos para la operación.";
            } else {
                $blog = new blog();
                $blog->idblog = $request->input("id");
                $blog->eliminar();
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
