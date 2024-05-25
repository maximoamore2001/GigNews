<?php

namespace App\Http\Controllers;

use App\entidades\blog;
use App\entidades\sucursal;

class ControladorWebBlog extends Controller
{
    public function index()
    {
        $titulo = "Listado de blogs";

        $blog = new blog();
        $aBlogs = $blog->obtenerTodos();


        return view("web.blog", compact("aSucursales", 'aCategorias'));
    }

}