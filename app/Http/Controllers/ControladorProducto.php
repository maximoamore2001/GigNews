<?php

namespace App\Http\Controllers;

use App\entidades\Sistema\Patente;
use App\entidades\Sistema\Usuario;

use App\Entidades\Producto;
use App\Entidades\tipo_producto;
use App\Entidades\pedido;

use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorProducto extends Controller
{

    public function nuevo()
    {
        $titulo = "Nuevo Producto";

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOSALTA")) {
                $codigo = "PRODUCTOSALTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $producto = new Producto();
                $producto->obtenerTodos();
                $categoria = new tipo_producto();
                $aCategorias = $categoria->obtenerTodos();
                return view("sistema.producto-nuevo", compact("titulo", "aCategorias", 'producto'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function index()
    {

        $titulo = "Listado de productos";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOCONSULTA")) {
                $codigo = "PRODUCTOCONSULTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.producto-listar", compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
        return view("sistema.producto-listar", compact('titulo'));
    }


    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar producto";
            $entidad = new Producto();
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
            if ($entidad->titulo == "" || $entidad->precio == "" || $entidad->cantidad == "" || $entidad->descripcion == "") {
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

                $_POST["id"] = $entidad->idproducto;
                return view('sistema.producto-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idproducto;
        $producto = new Producto();
        $producto->obtenerPorId($id);
        $categoria = new tipo_producto();
        $aCategorias = $categoria->obtenerTodos();

        return view('sistema.producto-nuevo', compact('msg', 'producto', 'titulo', 'aCategorias')) . '?id=' . $producto->idproducto;
    }

    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new producto();
        $aProductos = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aProductos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/producto/" . $aProductos[$i]->idproducto . "'>" . $aProductos[$i]->titulo . "</a>";
            $row[] = ("$") . number_format($aProductos[$i]->precio, 2, ',', '.');
            $row[] = $aProductos[$i]->cantidad;
            $row[] = $aProductos[$i]->tipoproducto;
            $row[] =  $aProductos[$i]->descripcion;
            $row[] = "<img height='100px' width='100px' src='/files/" . $aProductos[$i]->imagen . "'>";
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

    public function editar($idproducto)
    {
        $titulo = "Edicion de producto";

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PRODUCTOEDITAR")) {
                $codigo = "PRODUCTOEDITAR";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $producto = new producto();
                $producto->obtenerPorId($idproducto);
                $categoria = new tipo_producto();
                $aCategorias = $categoria->obtenerTodos();
                return view("sistema.producto-nuevo", compact("titulo", "producto", "aCategorias"));
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
                $idproducto = $request->input("id");
                $producto = new Producto();
                $pedido = new Pedido();
                //Si el producto tiene un pedido asociado no se tiene que poder eliminar.
                if ($pedido->existePedidoPorProducto($idproducto)) {
                    $resultado["err"] = EXIT_FAILURE;
                    $resultado["mensaje"] = "No se puede eliminar un producto con pedidos asociados";
                } else {
                    //Sino si.
                    $producto = new producto();
                    $producto->idproducto = $request->input("id");
                    $producto->eliminar();
                    $resultado["err"] = EXIT_SUCCESS;
                    $resultado["mensaje"] = "Registro eliminado exitosamente.";
                }
            }
        } else {
            $resultado["err"] = EXIT_FAILURE;
            $resultado["mensaje"] = "Usuario no autenticado.";
        }

        return json_encode($resultado);
    }
}
