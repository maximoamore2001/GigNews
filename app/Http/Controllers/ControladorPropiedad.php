<?php

namespace App\Http\Controllers;

use App\entidades\Sistema\Patente;
use App\entidades\Sistema\Usuario;

use App\entidades\propiedad;
use App\entidades\tipo_propiedad;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorPropiedad extends Controller
{

    public function nuevo()
    {
        $titulo = "Nueva propiedad";

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOSALTA")) {
                $codigo = "PRODUCTOSALTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $producto = new propiedad();
                $producto->obtenerTodos();
                $categoria = new tipo_propiedad();
                $aCategorias = $categoria->obtenerTodos();
                return view("sistema.propiedad-nuevo", compact("titulo", "aCategorias", 'producto'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function index()
    {

        $titulo = "Listado de propiedades";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOCONSULTA")) {
                $codigo = "PRODUCTOCONSULTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.propiedad-listar", compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
        return view("sistema.propiedad-listar", compact('titulo'));
    }


    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar propiedad";
            $entidad = new propiedad();
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
            if ($entidad->titulo == "" || $entidad->precio == "" || $entidad->descripcion == "") {
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

                $_POST["id"] = $entidad->idpropiedad;
                return view('sistema.propiedad-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idpropiedad;
        $producto = new propiedad();
        $producto->obtenerPorId($id);
        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();

        return view('sistema.propiedad-nuevo', compact('msg', 'producto', 'titulo', 'aCategorias')) . '?id=' . $producto->idpropiedad;
    }

    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new propiedad();
        $aProductos = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aProductos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/propiedad/" . $aProductos[$i]->idpropiedad . "'>" . $aProductos[$i]->titulo . "</a>";
            $row[] = ("$") . number_format($aProductos[$i]->precio, 2, ',', '.');
            $row[] = $aProductos[$i]->pais;
            $row[] = $aProductos[$i]->ciudad;
            $row[] = $aProductos[$i]->direccion;
            $row[] = $aProductos[$i]->areapropiedad;
            $row[] = $aProductos[$i]->idpropiedad;
            $row[] = "<img width='100px' src='/files/" . $aProductos[$i]->imagen . "'>";
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aProductos), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aProductos), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($idpropiedad)
    {
        $titulo = "Edicion de propiedad";

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOEDITAR")) {
                $codigo = "PRODUCTOEDITAR";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $producto = new propiedad();
                $producto->obtenerPorId($idpropiedad);
                $categoria = new tipo_propiedad();
                $aCategorias = $categoria->obtenerTodos();
                return view("sistema.propiedad-nuevo", compact("titulo", "producto", "aCategorias"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(request $request)
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOELIMINAR")) {
                $resultado["err"] = EXIT_FAILURE;
                $resultado["mensaje"] = "No tiene permisos para la operación.";
            } else {
                    //Sino si.
                    $producto = new propiedad();
                    $producto->idpropiedad = $request->input("id");
                    $producto->eliminar();
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
