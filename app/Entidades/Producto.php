<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = false;

    protected $fillable = [ //son los campos de la tabla producto en la BBDD
        'idpropiedad', 'titulo', 'cantidad', 'precio', 'descripcion', 'imagen', 'fk_idtipopropiedad',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request)
    {
        $this->idpropiedad = $request->input('id') != "0" ? $request->input('id') : $this->idpropiedad;
        $this->titulo = $request->input('txtTitulo');
        $this->precio = $request->input('txtPrecio');
        $this->cantidadhabitaciones = $request->input('txtCantidadHabitaciones');
        $this->cantidadbanios = $request->input('txtCantidadBanios');
        $this->cantidadplantas = $request->input('txtCantidadPlantas');
        $this->pais = $request->input('txtPais');
        $this->ciudad = $request->input('txtCiudad');
        $this->direccion = $request->input('txtDireccion');
        $this->garage = $request->input('txtGarage');
        $this->areapropiedad = $request->input('txtAreaPropiedad');
        $this->descripcion = $request->input('txtDescripcion');
        $this->imagen = $request->input('txtImagen');
        $this->fk_idtipopropiedad = $request->input('lstTipoPropiedad');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                A.idpropiedad,
                A.titulo,
                A.cantidad,
                A.precio,
                A.descripcion,
                A.imagen,
                A.fk_idtipopropiedad,
                B.nombre AS tipoproducto
            FROM productos A
            INNER JOIN tipo_producto B ON A.fk_idtipopropiedad = B.idtipoproducto
            ORDER BY idpropiedad ASC";
            $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idpropiedad)
    {
        $sql = "SELECT
                idpropiedad,
                  titulo,
                  cantidad,
                  precio,
                  descripcion,
                  imagen,
                  fk_idtipopropiedad
                FROM productos WHERE idpropiedad = $idpropiedad";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpropiedad = $lstRetorno[0]->idpropiedad;
            $this->titulo = $lstRetorno[0]->titulo;
            $this->cantidad = $lstRetorno[0]->cantidad;
            $this->precio = $lstRetorno[0]->precio;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->imagen = $lstRetorno[0]->imagen;
            $this->fk_idtipopropiedad = $lstRetorno[0]->fk_idtipopropiedad;
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
          fk_idtipopropiedad=$this->fk_idtipopropiedad
          WHERE idpropiedad=?";
        $affected = DB::update($sql, [$this->idpropiedad]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM productos WHERE
            idpropiedad=?";
        $affected = DB::delete($sql, [$this->idpropiedad]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO productos (
                titulo,
                precio,
                cantidad,
                descripcion,
                fk_idtipopropiedad,
                imagen
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->titulo,
            $this->precio,
            $this->cantidad,
            $this->descripcion,
            $this->fk_idtipopropiedad,
            $this->imagen
        ]);
        return $this->idpropiedad = DB::getPdo()->lastInsertId();
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
                A.idpropiedad,
                A.titulo,
                A.cantidad,
                A.precio,
                A.descripcion,
                A.imagen,
                A.fk_idtipopropiedad,
                B.nombre AS tipoproducto
            FROM productos A
            INNER JOIN tipo_producto B ON A.fk_idtipopropiedad = B.idtipoproducto
            WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.titulo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.cantidad LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR B.fk_idtipopropiedad LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.descripcion LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
