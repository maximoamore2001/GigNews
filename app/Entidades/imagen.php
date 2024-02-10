<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    public $timestamps = false;

    protected $fillable = [ //son los campos de la tabla imagenes en la BBDD
        'idimagen', 'imagen', 'nombre' , 'fk_idpropiedad',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request)
    {
        $this->idimagen = $request->input('id') != "0" ? $request->input('id') : $this->idimagen;
        $this->imagen = $request->input('txtImagenes');
        $this->nombre = $request->input('txtNombre');
        $this->fk_idpropiedad = $request->input('lstIdpropiedad');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idimagen,
                  nombre,
                  imagen,
                  fk_idpropiedad
                FROM imagenes ORDER BY nombre ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idimagen)
    {
        $sql = "SELECT
                  idimagen,
                  nombre,
                  imagen,
                  fk_idpropiedad
                FROM imagenes WHERE idimagen = $idimagen";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idimagen = $lstRetorno[0]->idimagen;
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
          fk_idpropiedad=$this->fk_idpropiedad
          WHERE idimagen=?";
        $affected = DB::update($sql, [$this->idimagen]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM imagenes WHERE
            idimagen=?";
        $affected = DB::delete($sql, [$this->idimagen]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO imagenes (
                nombre,
                imagen,
                fk_idpropiedad
            ) VALUES (?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->imagen,
            $this->fk_idpropiedad
        ]);
        return $this->idimagen = DB::getPdo()->lastInsertId();
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
                  idimagen,
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
