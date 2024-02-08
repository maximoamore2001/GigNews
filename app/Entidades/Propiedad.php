<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class propiedad extends Model
{
    protected $table = 'propiedades';
    public $timestamps = false;

    protected $fillable = [ //son los campos de la tabla producto en la BBDD
        'idpropiedad', 'titulo', 'precio', 'descripcion', 'imagen', 'fk_idtipopropiedad', 'cantidadhabitaciones', 'cantidadbanios',
        'cantidadplantas', 'pais', 'ciudad', 'direccion', 'garage', 'areapropiedad','imagen2', 'imagen3', 'imagen4', 'imagen5',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request)
    {
        $this->idpropiedad = $request->input('id') != "0" ? $request->input('id') : $this->idpropiedad;
        $this->titulo = $request->input('txtTitulo');
        $this->precio = $request->input('txtPrecio');
        $this->descripcion = $request->input('txtDescripcion');
        $this->imagen = $request->input('txtImagen');
        $this->imagen2 = $request->input('txtImagen2');
        $this->imagen3 = $request->input('txtImagen3');
        $this->imagen4 = $request->input('txtImagen4');
        $this->imagen5 = $request->input('txtImagen5');
        $this->cantidadhabitaciones = $request->input('txtCantidadHabitaciones');
        $this->cantidadbanios = $request->input('txtCantidadBanios');
        $this->cantidadplantas = $request->input('txtCantidadPlantas');
        $this->pais = $request->input('txtPais');
        $this->ciudad = $request->input('txtCiudad');
        $this->direccion = $request->input('txtDireccion');
        $this->garage = $request->input('txtGarage');
        $this->areapropiedad = $request->input('txtAreaPropiedad');
        $this->fk_idtipopropiedad = $request->input('lstTipoPropiedad');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                A.idpropiedad,
                A.cantidadhabitaciones,
                A.cantidadbanios,
                A.cantidadplantas,
                A.pais,
                A.ciudad,
                A.direccion,
                A.areapropiedad,
                A.garage,
                A.titulo,
                A.precio,
                A.descripcion,
                A.imagen,
                A.imagen2,
                A.imagen3,
                A.imagen4,
                A.imagen5,
                A.fk_idtipopropiedad,
                B.nombre AS tipopropiedad
            FROM propiedades A
            INNER JOIN tipo_propiedad B ON A.fk_idtipopropiedad = B.idtipopropiedad
            ORDER BY idpropiedad ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idpropiedad)
    {
        $sql = "SELECT
                    idpropiedad,
                    cantidadhabitaciones,
                    cantidadbanios,
                    cantidadplantas,
                    pais,
                    ciudad,
                    direccion,
                    areapropiedad,
                    garage,
                    titulo,
                    precio,
                    descripcion,
                    imagen,
                    imagen2,
                    imagen3,
                    imagen4,
                    imagen5,
                    fk_idtipopropiedad
                FROM propiedades WHERE idpropiedad = $idpropiedad";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpropiedad = $lstRetorno[0]->idpropiedad;
            $this->titulo = $lstRetorno[0]->titulo;
            $this->precio = $lstRetorno[0]->precio;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->imagen = $lstRetorno[0]->imagen;
            $this->imagen2 = $lstRetorno[0]->imagen2;
            $this->imagen3 = $lstRetorno[0]->imagen3;
            $this->imagen4 = $lstRetorno[0]->imagen4;
            $this->imagen5 = $lstRetorno[0]->imagen5;
            $this->cantidadhabitaciones = $lstRetorno[0]->cantidadhabitaciones;
            $this->cantidadbanios = $lstRetorno[0]->cantidadbanios;
            $this->cantidadplantas = $lstRetorno[0]->cantidadplantas;
            $this->pais = $lstRetorno[0]->pais;
            $this->ciudad = $lstRetorno[0]->ciudad;
            $this->direccion = $lstRetorno[0]->direccion;
            $this->garage = $lstRetorno[0]->garage;
            $this->areapropiedad = $lstRetorno[0]->areapropiedad;
            $this->fk_idtipopropiedad = $lstRetorno[0]->fk_idtipopropiedad;
            return $this;
        }
        return null;
    }


    public function guardar()
    {
        $sql = "UPDATE propiedades SET
        cantidadhabitaciones='$this->cantidadhabitaciones',
        cantidadbanios='$this->cantidadbanios',
        cantidadplantas='$this->cantidadplantas',
        pais='$this->pais',
        ciudad='$this->ciudad',
        direccion='$this->direccion',
        areapropiedad='$this->areapropiedad',
        garage='$this->garage',
        titulo='$this->titulo',
        precio=$this->precio,
        descripcion='$this->descripcion',
        imagen='$this->imagen',
        imagen2='$this->imagen2',
        imagen3='$this->imagen3',
        imagen4='$this->imagen4',
        imagen5='$this->imagen5',
        fk_idtipopropiedad=$this->fk_idtipopropiedad
          WHERE idpropiedad=?";
        $affected = DB::update($sql, [$this->idpropiedad]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM propiedades WHERE
            idpropiedad=?";
        $affected = DB::delete($sql, [$this->idpropiedad]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO propiedades (
                cantidadhabitaciones,
                cantidadbanios,
                cantidadplantas,
                pais,
                ciudad,
                direccion,
                areapropiedad,
                garage,
                titulo,
                precio,
                descripcion,
                imagen,
                imagen2,
                imagen3,
                imagen4,
                imagen5,
                fk_idtipopropiedad
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->cantidadhabitaciones,
            $this->cantidadbanios,
            $this->cantidadplantas,
            $this->pais,
            $this->ciudad,
            $this->direccion,
            $this->areapropiedad,
            $this->garage,
            $this->titulo,
            $this->precio,
            $this->descripcion,
            $this->imagen,
            $this->imagen2,
            $this->imagen3,
            $this->imagen4,
            $this->imagen5,
            $this->fk_idtipopropiedad
        ]);
        return $this->idpropiedad = DB::getPdo()->lastInsertId();
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.titulo',
            2 => 'A.precio',
            3 => 'B.nombre',
            4 => 'A.descripcion',
            5 => 'A.cantidadhabitaciones',
            6 => 'A.cantidadbanios',
            7 => 'A.cantidadplantas',
            8 => 'B.pais',
            9 => 'A.ciudad',
            10 => 'A.direccion',
            11 => 'A.areapropiedad',
            12 => 'A.garage',
        );
        $sql = "SELECT DISTINCT
                A.idpropiedad,
                A.cantidadhabitaciones,
                A.cantidadbanios,
                A.cantidadplantas,
                A.pais,
                A.ciudad,
                A.direccion,
                A.areapropiedad,
                A.garage,
                A.titulo,
                A.precio,
                A.descripcion,
                A.imagen,
                A.imagen2,
                A.imagen3,
                A.imagen4,
                A.imagen5,
                A.fk_idtipopropiedad,
                B.nombre AS tipopropiedad
            FROM propiedades A
            INNER JOIN tipo_propiedad B ON A.fk_idtipopropiedad = B.idtipopropiedad
            WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.titulo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR B.fk_idtipopropiedad LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.cantidadhabitaciones LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.cantidadbanios LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.cantidadplantas LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.pais LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.ciudad LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.direccion LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.areapropiedad LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR A.garage LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
