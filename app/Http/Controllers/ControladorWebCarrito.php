<?php

namespace App\Http\Controllers;


use App\Entidades\carrito;
use App\entidades\Cliente;
use App\entidades\Pedido;
use App\entidades\pedido_producto;
use App\entidades\sucursal;
use Illuminate\Http\Request;
use Session;

//SDK MERCADO PAGO PARA HACER TRANSFERENCIAS
// Y PAGAR EL CARRITO

use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\payment;
use MercadoPago\Preference;
use MercadoPago\SDK;

require app_path() . '/start/constants.php';

class ControladorWebCarrito extends Controller
{
    public function index()
    {

        $idcliente = Session::get("idcliente");

        if(isset($idcliente) && $idcliente > 0){
        $carrito = new carrito();
        $aCarritos = $carrito->obtenerPorCliente($idcliente);
        
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view("web.carrito", compact("aCarritos", "aSucursales"));
    } else{
        return redirect("/login");
    }
    }

    public function procesar(Request $request)
    {
        if (isset($_POST["btnBorrar"])) {
            return  $this->eliminar($request);
        } else  if (isset($_POST["btnActualizar"])) {
            return  $this->actualizar($request);
        } else if (isset($_POST["btnFinalizar"])) {
            return  $this->insertarPedido($request);
        }
    }

    public function actualizar(request $request)
    {

        $idcarrito = $request->input("txtCarrito");
        $idproducto = $request->input("txtProducto");
        $cantidad = $request->input("txtCantidad");
        $idcliente = Session::get("idcliente");

        $carrito = new carrito();
        $aCarritos = $carrito->obtenerPorCliente($idcliente);
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $carrito->idcarrito = $idcarrito;
        $carrito->cantidad = $cantidad;
        $carrito->fk_idcliente = $idcliente;
        $carrito->fk_idproducto = $idproducto;
        $carrito->guardar();

        $msg["ESTADO"] = MSG_SUCCESS;
        $msg["MSG"] = "producto actualizado";

        return view("web.carrito", compact("msg", "aCarritos", "aSucursales"));
    }


    public function eliminar(Request $request)
    {

        $idcliente = Session::get("idcliente");
        $idcarrito = $request->input("txtCarrito");

        $carrito = new carrito();
        $aCarritos = $carrito->obtenerPorCliente($idcliente);

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $carrito->idcarrito = $idcarrito;
        $carrito->eliminar();
        $msg["ESTADO"] = MSG_SUCCESS;
        $msg["MSG"] = "producto eliminado exitosamente.";
        $aCarritos = $carrito->obtenerPorCliente($idcliente);

        return view("web.carrito", compact("msg", "aCarritos", "aSucursales"));
    }


    public function insertarPedido(Request $request)
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();
        $idsucursal = $request->input("lstSucursal");
        $pago = $request->input("lstMetodoDePago");

        $idcliente = Session::get("idcliente");

        if ($pago == "MercadoPago") {
            $this->procesarMercadoPago($request);
        } else {
            $carrito = new carrito();
            $aCarritos = $carrito->obtenerPorCliente($idcliente);

            $total = 0;
            foreach ($aCarritos as $item) {
                $total += $item->cantidad * $item->precio;
            }


            $fecha = date("Y-m-d");

            $pedido = new Pedido();
            $pedido->fk_idsucursal = $idsucursal;
            $pedido->fk_idcliente = $idcliente;
            $pedido->fk_idestadopedido = 1;
            $pedido->fecha = $fecha;
            $pedido->total = $total;
            $pedido->pago = $pago;
            $pedido->insertar();

            $pedidoProducto = new pedido_producto();
            foreach ($aCarritos as $item) {
                $pedidoProducto->fk_idproducto = $item->fk_idproducto; // $item = $carrito
                $pedidoProducto->fk_idpedido = $pedido->idpedido;
                $pedidoProducto->cantidad = $item->cantidad;
                $pedidoProducto->insertar();
            }

            $carrito->eliminarPorCliente($idcliente);

            $msg["ESTADO"] = MSG_SUCCESS;
            $msg["MSG"] = "Pedido confirmado";

            return view("web.carrito", compact("msg", "aCarritos", "aSucursales"));
        }
    }

    public function procesarMercadoPago(Request $request)
    {
        $access_token = "";

        SDK::setClientId(config("payment-methods.mercadopago.client"));
        SDK::setClientSecret(config("payment-methods.mercadopago.secret"));
        SDK::setAccessToken($access_token);

        $idsucursal = $request->input("lstSucursal");
        $pago = $request->input("lstMetodoDePago");

        $idcliente = Session::get("idcliente");
        $cliente = new Cliente();
        $cliente->obtenerPorId($idcliente);

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $carrito = new carrito();
        $aCarritos = $carrito->obtenerPorCliente($idcliente); //obtener carrito por cliente

        $total = 0;
        foreach ($aCarritos as $item) {
            $total += $item->cantidad * $item->precio;
        }
        $fecha = date("Y-m-d");

        //armado del producto $item
        $item = new Item();
        $item->id = "1234";
        $item->title = "Burger SRL";
        $item->category_id = "products";
        $item->quantity = 1;
        $item->unit_price = $total;
        $item->currency_id = "ARS";

        $preference = new Preference();
        $preference->items = array($item);

        //datos del comprador
        $payer = new Payer();
        $payer->name = $cliente->nombre;
        $payer->surname = $cliente->apellido;
        $payer->email = $cliente->correo;
        $payer->date_created = date('Y-m-d H:m:s');
        $payer->identification = array(
            "type" => "DNI",
            "numer" => $cliente->dni,
        );

        $preference->payer = $payer;

        $pedido = new Pedido();
        $pedido->fk_idsucursal = $idsucursal;
        $pedido->fk_idcliente = $idcliente;
        $pedido->fk_idestadopedido = 5;
        $pedido->fecha = $fecha;
        $pedido->total = $total;
        $pedido->pago = $pago;

        $pedido->insertar();

        $pedidoProducto = new pedido_producto();
        foreach ($aCarritos as $item) {
            $pedidoProducto->fk_idproducto = $item->fk_idproducto; // $item = $carrito
            $pedidoProducto->fk_idpedido = $pedido->idpedido;
            $pedidoProducto->cantidad = $item->cantidad;
            $pedidoProducto->insertar();
        }

        $carrito->eliminarPorCliente($idcliente);


        //Url de configuracion para indicarle a MP

        $preference->back_urls = [
            "success" => "http://http://127.0.0.1:8000/mercado-pago/aprobado/" . $pedido->idpedido,
            "pending" => "http://http://127.0.0.1:8000/mercado-pago/pendiente/" . $pedido->idpedido,
            "failure" => "http://http://127.0.0.1:8000/mercado-pago/error/" . $pedido->idpedido,
        ];

        $preference->payment_methods = array("installments" => 6);
        $preference->auto_return = "all";
        $preference->notification_url = '';
        $preference->save(); //Ejecuta la transacción

    }
}
