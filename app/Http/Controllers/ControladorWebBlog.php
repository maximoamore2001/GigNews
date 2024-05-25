<?php

namespace App\Http\Controllers;

use App\entidades\blog;
use App\entidades\sucursal;

class ControladorWebBlog extends Controller
{
    public function index()
    {
        $titulo = "blogs";

        $blog = new blog();
        $aBlogs = $blog->obtenerTodos();
        
        $sucursal = new sucursal();
        $aSucursales = $sucursal->obtenerTodos();


        return view("web.blog", compact("aSucursales", 'aBlogs'));
    }

}