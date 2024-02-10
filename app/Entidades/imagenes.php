<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    public $timestamps = false;

    protected $fillable = [ //son los campos de la tabla imagenes en la BBDD
        'idimagenes', 'imagen', 'nombre' , 'fk_idpropiedad',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request)
    {
        $this->idimagenes = $request->input('id') != "0" ? $request->input('id') : $this->idimagenes;
        $this->imagen = $request->input('txtImagen');
        $this->nombre = $request->input('txtNombre');
        $this->fk_idpropiedad = $request->input('lstIdpropiedad');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idimagenes,
                  nombre,
                  imagen,
                  fk_idpropiedad
                FROM imagenes ORDER BY nombre ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idimagenes)
    {
        $sql = "SELECT
                  idimagenes,
                  imagen,
                  nombre,
                  fk_idpropiedad
                FROM imagenes WHERE idimagenes = $idimagenes";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idimagenes = $lstRetorno[0]->idimagenes;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->imagen = $lstRetorno[0]->imagen;
            $this->fk_idpropiedad = $lstRetorno[0]->fk_idpropiedad;
            return $this;
        }
        return null;
    }


    public function guardar()
    {
        $sql = "UPDATE imagenes SET
          nombre='$this->nombre',
          imagen='$this->imagen',
          fk_idpropiedad=$this->fk_idpropiedad,
          WHERE idimagenes=?";
        $affected = DB::update($sql, [$this->idimagenes]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM imagenes WHERE
            idimagenes=?";
        $affected = DB::delete($sql, [$this->idimagenes]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO imagenes (
                nombre,
                imagen,
                fk_idpropiedad
            ) VALUES (?, ?, ?,);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->imagen,
            $this->fk_idpropiedad,
        ]);
        return $this->idimagenes = DB::getPdo()->lastInsertId();
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'nombre',
            1 => 'imagen',
            2 => 'fk_idpropiedad',
        );
        $sql = "SELECT DISTINCT
                  idimagenes,
                  nombre,
                  imagen,
                  fk_idpropiedad
                FROM imagenes WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR imagen LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR fk_idpropiedad LIKE '%" . $request['search']['value'] . "%' ";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }

 
}
