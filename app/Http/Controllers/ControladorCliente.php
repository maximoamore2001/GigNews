<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\entidades\Pedido;

use App\entidades\Sistema\Patente;
use App\entidades\Sistema\Usuario;

use Illuminate\Http\Request;
require app_path() . '/start/constants.php';

class ControladorCliente extends Controller
{
    public function nuevo()
    {
        $titulo = "Nuevo Cliente";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLIENTEALTA")) {
                $codigo = "CLIENTEALTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $cliente = new cliente();
                return view("sistema.cliente-nuevo", compact("titulo", 'cliente'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function index()
    {
        $titulo = "Listado de clientes";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLIENTECONSULTA")) {
                $codigo = "CLIENTECONSULTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.cliente-listar", compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
        return view("sistema.cliente-listar", compact('titulo'));
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar cliente";
            $entidad = new Cliente();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->nombre == "" || $entidad->telefono == "" || $entidad->clave == "" || $entidad->dni == "" || $entidad->direccion == "" || $entidad->correo == "") {
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

                $_POST["id"] = $entidad->idcliente;
                return view('sistema.cliente-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idcliente;
        $cliente = new Cliente();
        $cliente->obtenerPorId($id);

        return view('sistema.cliente-nuevo', compact('msg', 'cliente', 'titulo')) . '?id=' . $cliente->idcliente;
    }

    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new Cliente();
        $aClientes = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aClientes) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/cliente/" . $aClientes[$i]->idcliente . "'>" . $aClientes[$i]->nombre . "</a>";
            $row[] = $aClientes[$i]->apellido;
            $row[] = $aClientes[$i]->telefono;
            $row[] = $aClientes[$i]->correo;
            $row[] = $aClientes[$i]->dni;
            $row[] = $aClientes[$i]->direccion;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aClientes), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aClientes), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($idcliente)
    {
        $titulo = "Edición de cliente";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLIENTEEDITAR")) {
                $codigo = "CLIENTEEDITAR";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $cliente = new Cliente();
                $cliente->obtenerPorId($idcliente);
                return view("sistema.cliente-nuevo", compact("titulo", "cliente"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(request $request)
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLIENTEELIMINAR")) {
                $resultado["err"] = EXIT_FAILURE;
                $resultado["mensaje"] = "No tiene permisos para la operación.";
            } else {
                $idcliente = $request->input("id");
                $cliente = new Cliente();
                $pedido = new Pedido();
                //Si el cliente tiene un pedido asociado no se tiene que poder eliminar.
                if ($pedido->existePedidoPorCliente($idcliente)) {
                    $resultado["err"] = EXIT_FAILURE;
                    $resultado["mensaje"] = "No se puede eliminar un cliente con pedidos asociados.";
                } else {
                    //Sino si.
                    $cliente = new cliente();
                    $cliente->idcliente = $request->input("id");
                    $cliente->eliminar();
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
