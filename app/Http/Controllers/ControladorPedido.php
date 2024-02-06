<?php

namespace App\Http\Controllers;

use App\entidades\Sistema\Patente;
use App\entidades\Sistema\Usuario;

use App\Entidades\Pedido;
use Illuminate\Http\Request;

use App\Entidades\Cliente;
use App\Entidades\Estado_pedido;
use App\entidades\pedido_producto;
use App\Entidades\sucursal;

require app_path() . '/start/constants.php';

class ControladorPedido extends Controller
{

    public function nuevo()
    {
        $titulo = "Nuevo pedido";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PEDIDOALTA")) {
                $codigo = "PEDIDOAALTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $pedido = new pedido();
                $pedido->obtenerTodos();
                //CLIENTE OBTENER TODOS
                $cliente = new Cliente();
                $aClientes = $cliente->obtenerTodos();
                //ESTADO_PEDIDO OBTENER TODOS
                $estadopedido = new Estado_pedido();
                $aEstadoPedidos = $estadopedido->obtenerTodos();
                //SUCURSAL OBTENER TODOS
                $sucursal = new sucursal();
                $aSucursales = $sucursal->obtenerTodos();
                return view("sistema.pedido-nuevo", compact("titulo", "pedido", "aClientes", "aSucursales", "aEstadoPedidos"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function index()
    {
        $titulo = "Listado de pedidos";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PEDIDOCONSULTA")) {
                $codigo = "PEDIDOCONSULTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.pedido-listar", compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }

        return view("sistema.pedido-listar", compact('titulo'));
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar pedido";
            $entidad = new Pedido();
            $entidad->cargarDesdeRequest($request);

            $pedido = new pedido();
            $pedido->obtenerTodos();
            //CLIENTE OBTENER TODOS
            $cliente = new Cliente();
            $aClientes = $cliente->obtenerTodos();
            //ESTADO_PEDIDO OBTENER TODOS
            $estadopedido = new Estado_pedido();
            $aEstadoPedidos = $estadopedido->obtenerTodos();
            //SUCURSAL OBTENER TODOS
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();

            //validaciones
            if ($entidad->fk_idcliente == "" || $entidad->fk_idsucursal == "" || $entidad->fk_idestadopedido == "" || $entidad->fecha == "" || $entidad->total == "" || $entidad->pago == "") {
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

                $_POST["id"] = $entidad->idpedido;
                return view('sistema.pedido-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idpedido;
        $pedido = new Pedido();
        $pedido->obtenerPorId($id);
        //CLIENTE OBTENER TODOS
        $cliente = new Cliente();
        $aClientes = $cliente->obtenerTodos();
        //ESTADO_PEDIDO OBTENER TODOS
        $estadopedido = new estado_pedido();
        $aEstadoPedidos = $estadopedido->obtenerTodos();
        //SUCURSAL OBTENER TODOS
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view('sistema.pedido-nuevo', compact('titulo', "pedido", "aClientes", "aSucursales", "aEstadoPedidos")) . '?id=' . $pedido->idpedido;
    }

    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new Pedido();
        $aPedidos = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aPedidos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/pedido/" . $aPedidos[$i]->idpedido . "'>" . $aPedidos[$i]->fecha . "</a>";    //link de modificación  
            //$row[] = $aPedidos[$i]->fecha;
            $row[] = $aPedidos[$i]->sucursal;
            $row[] = $aPedidos[$i]->cliente;
            $row[] = $aPedidos[$i]->estado_del_pedido;
            $row[] = "$" . number_format($aPedidos[$i]->total, 2, ',', '.');
            $row[] = $aPedidos[$i]->pago;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aPedidos), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aPedidos), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($idpedido)
    {
        $titulo = "Edición de pedido";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PEDIDOEDITAR")) {
                $codigo = "PEDIDOEDITAR";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $pedido = new Pedido();
                $pedido->obtenerPorId($idpedido);
                //ESTADO_PEDIDO OBTENER TODOS
                $cliente = new Cliente();
                $aClientes = $cliente->obtenerTodos();
                //ESTADO_PEDIDO OBTENER TODOS
                $estadopedido = new Estado_pedido();
                $aEstadoPedidos = $estadopedido->obtenerTodos();
                //SUCURSAL OBTENER TODOS
                $sucursal = new sucursal();
                $aSucursales = $sucursal->obtenerTodos();


                $entidadPedidoProducto = new pedido_producto();
                $aPedidoProductos = $entidadPedidoProducto->obtenerPorPedido($idpedido);


                return view('sistema.pedido-nuevo', compact("titulo", "pedido", "aClientes", "aSucursales", "aEstadoPedidos", "aPedidoProductos"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    /*  public function eliminar(request $request){
        $idpedido = $request->input("id");
        $pedido = new pedido();
        $pedido = new cliente();


        //Si el pedido tiene un pedido asociado no se tiene que poder eliminar.
        if($pedido->existeClientePorPedido($idpedido)){
                $resultado["err"] = EXIT_FAILURE;
                $resultado["mensaje"] = "No se puede eliminar un pedido con pedidos asociados";
            
        } else{
                //Sino si.
                $pedido = new pedido();
                $pedido->idpedido = $request->input("id");
                $pedido->eliminar();
                $resultado["err"] = EXIT_SUCCESS;
                $resultado["mensaje"] = "Registro eliminado exitosamente.";
        }
        return json_encode($resultado);
}*/

    public function eliminar(request $request)
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PEDIDOBAJA")) {
                $resultado["err"] = EXIT_FAILURE;
                $resultado["mensaje"] = "No tiene permisos para la operación.";
            } else {
                $pedido = new pedido();
                $pedido->idpedido = $request->input("id");
                $pedido->eliminar();
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
