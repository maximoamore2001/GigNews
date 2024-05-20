<?php

namespace App\Http\Controllers;

use App\entidades\sucursal;

class ControladorWebContactoGracias extends Controller
{
    public function index()
    {
            return view("web.contacto-gracias");
    }
}