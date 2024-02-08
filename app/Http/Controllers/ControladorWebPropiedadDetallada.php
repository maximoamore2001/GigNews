<?php

namespace App\Http\Controllers;
use App\entidades\sucursal;
use App\entidades\carrito;
use App\Entidades\propiedad;
use App\entidades\tipo_propiedad;
use Illuminate\Http\Request;
use Session;
require app_path() . '/start/constants.php';


class ControladorWebPropiedadDetallada extends Controller
{
    public function index()
    {
        
        $titulo = "Listado de categorias";

        $propiedad = new propiedad();
        $aPropiedades = $propiedad->obtenerTodos(); 

        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view("web.propiedad-detallada", compact("titulo", "aCategorias", "aPropiedades" , "aSucursales"));
    }


    public function insertar(request $request)
    {
        $idcliente = Session::get("idcliente");

        $producto = new propiedad();
        $aProductos = $producto->obtenerTodos();

        $categoria = new tipo_propiedad();
        $aCategorias = $categoria->obtenerTodos();

        $idproducto = $request->input("txtProducto");
        $cantidad = $request->input("txtCantidad");

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $idproducto = $request->input("txtProducto");
        $cantidad = $request->input("txtCantidad");

        if (isset($idcliente) && $idcliente > 0) {
            if (isset($cantidad) && $cantidad > 0) {
                $carrito = new carrito();
                $carrito->fk_idcliente = $idcliente;
                $carrito->fk_idproducto = $idproducto;
                $carrito->cantidad = $cantidad;
                $carrito->insertar();

                $msg["ESTADO"] = MSG_SUCCESS;
                $msg["MSG"] = "producto agregado al carrito";
                return view("web.takeaway", compact('msg', "aCategorias", "aProductos", "aSucursales"));
            } else {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "no se agregó ningún producto al carrito";
                return view("web.takeaway", compact('msg', "aCategorias", "aProductos", "aSucursales"));
            }
        } else {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "Debe iniciar sesión para realizar un pedido";
            return view("web.takeaway", compact('msg', "aCategorias", "aProductos", "aSucursales"));
        }



        //return view("web.Takeaway", compact("aCategorias"));
    }
}
