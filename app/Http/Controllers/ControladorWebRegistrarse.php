<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;
use App\entidades\cliente;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorWebRegistrarse extends Controller
{
      public function index()
      {
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
            return view("web.registrarse", compact("aSucursales"));
      }

      public function registrarse(Request $request)
      {
            $sucursal = new sucursal();
            $aSucursales = $sucursal->obtenerTodos();
            $titulo = "Nuevo registro";
            $entidad = new cliente();
            $entidad->nombre = $request->input("txtNombre");
            $entidad->apellido = $request->input("txtApellido");
            $entidad->telefono = $request->input("txtTelefono");
            $entidad->correo = $request->input("txtCorreo");
            $entidad->dni = $request->input("txtDni");
            $entidad->direccion = $request->input("txtDireccion");
            $entidad->clave = password_hash($request->input("txtClave"), PASSWORD_DEFAULT);

            if ($entidad->nombre == "" || $entidad->apellido == "" || $entidad->telefono == "" || $entidad->direccion == "" || $entidad->dni == "" || $entidad->correo == "" || $entidad->clave == "") {
                  $msg["ESTADO"] = MSG_ERROR;
                  $msg["MSG"] = "complete todos los datos";
                  return view("web.registrarse", compact('titulo', 'msg', 'aSucursales'));
            } else {
                  $entidad->insertar();
                  return redirect("/login");
            }
      }
}
