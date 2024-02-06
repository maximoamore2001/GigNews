<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = false;

    protected $fillable = [ //son los campos de la tabla producto en la BBDD
        'idproducto', 'titulo', 'cantidad', 'precio', 'descripcion', 'imagen', 'fk_idtipoproducto',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request)
    {
        $this->idproducto = $request->input('id') != "0" ? $request->input('id') : $this->idproducto;
        $this->titulo = $request->input('txtTitulo');
        $this->precio = $request->input('txtPrecio');
        $this->cantidad = $request->input('txtCantidad');
        $this->descripcion = $request->input('txtDescripcion');
        $this->imagen = $request->input('txtImagen');
        $this->fk_idtipoproducto = $request->input('lstTipoProducto');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                A.idproducto,
                A.titulo,
                A.cantidad,
                A.precio,
                A.descripcion,
                A.imagen,
                A.fk_idtipoproducto,
                B.nombre AS tipoproducto
            FROM productos A
            INNER JOIN tipo_producto B ON A.fk_idtipoproducto = B.idtipoproducto
            ORDER BY idproducto ASC";
            $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idproducto)
    {
        $sql = "SELECT
                idproducto,
                  titulo,
                  cantidad,
                  precio,
                  descripcion,
                  imagen,
                  fk_idtipoproducto
                FROM productos WHERE idproducto = $idproducto";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idproducto = $lstRetorno[0]->idproducto;
            $this->titulo = $lstRetorno[0]->titulo;
            $this->cantidad = $lstRetorno[0]->cantidad;
            $this->precio = $lstRetorno[0]->precio;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->imagen = $lstRetorno[0]->imagen;
            $this->fk_idtipoproducto = $lstRetorno[0]->fk_idtipoproducto;
            return $this;
        }
        return null;
    }


    public function guardar()
    {
        $sql = "UPDATE productos SET
          titulo='$this->titulo',
          cantidad=$this->cantidad,
          precio=$this->precio,
          descripcion='$this->descripcion',
          imagen='$this->imagen',
          fk_idtipoproducto=$this->fk_idtipoproducto
          WHERE idproducto=?";
        $affected = DB::update($sql, [$this->idproducto]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM productos WHERE
            idproducto=?";
        $affected = DB::delete($sql, [$this->idproducto]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO productos (
                titulo,
                precio,
                cantidad,
                descripcion,
                fk_idtipoproducto,
                imagen
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->titulo,
            $this->precio,
            $this->cantidad,
            $this->descripcion,
            $this->fk_idtipoproducto,
            $this->imagen
        ]);
        return $this->idproducto = DB::getPdo()->lastInsertId();
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.titulo',
            1 => 'A.cantidad',
            2 => 'A.precio',
            3 => 'B.nombre',
            4 => 'A.descripcion',
        );
        $sql = "SELECT DISTINCT
                A.idproducto,
                A.titulo,
                A.cantidad,
                A.precio,
                A.descripcion,
                A.imagen,
                A.fk_idtipoproducto,
                B.nombre AS tipoproducto
            FROM productos A
            INNER JOIN tipo_producto B ON A.fk_idtipoproducto = B.idtipoproducto
            WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.titulo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.cantidad LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR B.fk_idtipoproducto LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.descripcion LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
