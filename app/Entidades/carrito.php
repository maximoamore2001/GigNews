<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
      protected $table = 'carritos';
      public $timestamps = false;

      protected $fillable = [ //son los campos de la tabla pedido en la BBDD
            'idcarrito', 'fk_idcliente', 'fk_idproducto', 'cantidad',
      ];


      protected $hidden = [];


      public function obtenerTodos()
      {
            $sql = "SELECT
                  idcarrito,
                  fk_idcliente,
                  fk_idproducto,
                  cantidad
                FROM carritos ORDER BY idcarrito ASC";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idcarrito)
      {
            $sql = "SELECT
                  idcarrito,
                  fk_idcliente,
                  fk_idproducto,
                  cantidad
                FROM carritos WHERE idcarrito = $idcarrito";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idcarrito = $lstRetorno[0]->idcarrito;
                  $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
                  $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
                  $this->cantidad = $lstRetorno[0]->cantidad;

                  return $this;
            }
            return null;
      }


      public function guardar()
      {
            $sql = "UPDATE carritos SET
                fk_idcliente=$this->fk_idcliente,
                fk_idproducto=$this->fk_idproducto,
                cantidad='$this->cantidad'
          WHERE idcarrito=?";
            $affected = DB::update($sql, [$this->idcarrito]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM carritos WHERE idcarrito=?";
            $affected = DB::delete($sql, [$this->idcarrito]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO carritos (
                fk_idcliente,
                fk_idproducto,
                  cantidad
            ) VALUES (?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->fk_idcliente,
                  $this->fk_idproducto,
                  $this->cantidad
            ]);
            return $this->idcarrito = DB::getPdo()->lastInsertId();
      }

      public function obtenerPorCliente($idcliente)
      {
            $sql = "SELECT
                  A.idcarrito,
                  A.fk_idcliente,
                  A.fk_idproducto,
                  A.cantidad,
                  B.titulo AS producto,
                  B.precio AS precio,
                  B.cantidad AS productoCantidad,
                  b.imagen AS imagen
                  FROM carritos A
                  INNER JOIN productos B ON A.fk_idproducto = B.idproducto
                  WHERE fk_idcliente = $idcliente";

            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }
      public function eliminarPorCliente($idcliente){
            $sql = "DELETE FROM carritos WHERE 
            fk_idcliente=?";
            $affected = DB::delete($sql, [$this->$idcliente]);
      }

      
}
