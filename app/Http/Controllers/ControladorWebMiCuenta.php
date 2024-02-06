<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;
use App\entidades\Cliente;
use App\entidades\pedido;
use Illuminate\Http\Request;
use Session;

require app_path() . '/start/constants.php';

class ControladorWebMiCuenta extends Controller
{
    public function index()
    {

        $idcliente = session::get("idcliente");
        if ($idcliente != "") {

            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();

            $cliente = new Cliente();
            $cliente->obtenerPorId($idcliente);

            $pedido = new pedido();
            $aPedidos = $pedido->obtenerPedidoPorCliente();
            return view("web.mi-cuenta", compact("cliente", "aPedidos", "aSucursales"));
        } else {
            return redirect("/login");
        }
    }

    public function guardar(request $request)
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $idcliente = session::get("idcliente");
        $cliente = new Cliente();

        $cliente->idcliente = $idcliente;
        $cliente->nombre = $request->input('txtNombre');
        $cliente->apellido = $request->input('txtApellido');
        $cliente->telefono = $request->input('txtTelefono');
        $cliente->dni = $request->input('txtDni');
        $cliente->correo = $request->input('txtCorreo');
        $cliente->direccion = $request->input('txtDireccion');

        $idpedido = 1;
        $pedido = new pedido();
        $pedido->obtenerPorId($idpedido);

        $msg["ESTADO"] = MSG_SUCCESS;
        $msg["MSG"] = "Cambios actualizados";

        $pedido = new pedido();
        $aPedidos = $pedido->obtenerPedidoPorCliente();

        $cliente->guardar();
        return view("web.mi-cuenta", compact("cliente", "pedido", "msg", "aPedidos", "aSucursales"));
    }
}
