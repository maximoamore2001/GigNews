<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;
use App\entidades\Cliente;
use Illuminate\Http\Request;
use Session;

require app_path() . '/start/constants.php';

class ControladorWebCambiarClave extends Controller
{
    public function index()
    {

      $sucursal = new sucursal();
      $aSucursales = $sucursal->obtenerTodos();

      return view("web.cambiar-clave", compact("aSucursales"));
    }

    public function cambiar(Request $request){

        $titulo = "cambiar clave";
        $idcliente = Session::get("idcliente");
        $cliente = new Cliente();
        $clave1 = $request->input("txtNuevaContrasena");
        $clave2 = $request->input("txtRepetirContrasena");

        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        if($clave1 != "" && $clave1 == $clave2){
          
            $cliente->obtenerPorId($idcliente);
            $cliente->clave = password_hash($clave1, PASSWORD_DEFAULT);
            $cliente->guardar();
            $msg["ESTADO"] = MSG_SUCCESS;
            $msg["MSG"] = "Contraseña guardada con éxito" ;
            return view("web.cambiar-clave", compact('msg', "aSucursales"));
          } else {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "claves incorrectas, vuelva a intentarlo" ;
            return view("web.cambiar-clave", compact('msg', "aSucursales"));
          }


        }

    }


