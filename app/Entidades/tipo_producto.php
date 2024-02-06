<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class tipo_producto extends Model
{
      protected $table = 'tipo_producto';
      public $timestamps = false;

      protected $fillable = [ //son los campos de la tabla pedido en la BBDD
            'idtipoproducto', 'nombre',
      ];

      protected $hidden = [];

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idtipoproducto,
                  nombre
                FROM tipo_producto ORDER BY idtipoproducto ASC";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idtipoproducto)
      {
            $sql = "SELECT
                idtipoproducto,
                nombre
                FROM tipo_producto WHERE idtipoproducto = $idtipoproducto";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idtipoproducto = $lstRetorno[0]->idtipoproducto;
                  $this->nombre = $lstRetorno[0]->nombre;

                  return $this;
            }
            return null;
      }


      public function guardar()
      {
            $sql = "UPDATE tipo_producto SET
                nombre='$this->nombre'
          WHERE idtipoproducto=?";
            $affected = DB::update($sql, [$this->idtipoproducto]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM tipo_producto WHERE idtipoproducto=?";
            $affected = DB::delete($sql, [$this->idtipoproducto]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO tipo_producto (
                nombre
            ) VALUES (?);";
            $result = DB::insert($sql, [
                  $this->nombre
            ]);
            return $this->idtipoproducto = DB::getPdo()->lastInsertId();
      }
}

?>