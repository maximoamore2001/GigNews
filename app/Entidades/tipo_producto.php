<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class tipo_propiedad extends Model
{
      protected $table = 'tipo_propiedad';
      public $timestamps = false;

      protected $fillable = [ //son los campos de la tabla pedido en la BBDD
            'idtipopropiedad', 'nombre',
      ];

      protected $hidden = [];

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idtipopropiedad,
                  nombre
                FROM tipo_producto ORDER BY idtipopropiedad ASC";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idtipopropiedad)
      {
            $sql = "SELECT
                idtipopropiedad,
                nombre
                FROM tipo_producto WHERE idtipopropiedad = $idtipopropiedad";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idtipopropiedad = $lstRetorno[0]->idtipopropiedad;
                  $this->nombre = $lstRetorno[0]->nombre;

                  return $this;
            }
            return null;
      }


      public function guardar()
      {
            $sql = "UPDATE tipo_producto SET
                nombre='$this->nombre'
          WHERE idtipopropiedad=?";
            $affected = DB::update($sql, [$this->idtipopropiedad]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM tipo_producto WHERE idtipopropiedad=?";
            $affected = DB::delete($sql, [$this->idtipopropiedad]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO tipo_producto (
                nombre
            ) VALUES (?);";
            $result = DB::insert($sql, [
                  $this->nombre
            ]);
            return $this->idtipopropiedad = DB::getPdo()->lastInsertId();
      }
}

?>