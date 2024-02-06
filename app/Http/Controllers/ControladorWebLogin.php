<?php

namespace App\Http\Controllers;
use App\entidades\sucursal;
use App\entidades\Cliente;
use Illuminate\Http\Request;
use Session;

class ControladorWebLogin extends Controller
{
    public function index()
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();
        return view("web.login", compact("aSucursales"));
    }
    
    public function ingresar(request $request)
    {
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $correo = $request->input('txtCorreo');   
        $clave = $request->input('txtClave');

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);

        if($cliente->correo != ""){
            if(password_verify($clave, $cliente->clave)){
                Session::put("idcliente", $cliente->idcliente);
                return redirect('/');
            }else{
                $mensaje = "Credenciales incorrectas";
                return view("web.login", compact('mensaje', "aSucursales"));
            }
        }
    }

    public function logout(Request $request){
        
        Session::Put("idcliente", "");
        return redirect("/");
    }
    
}
