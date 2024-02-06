<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class pedido_producto extends Model
{
      protected $table = 'pedido_productos';
      public $timestamps = false;

      protected $fillable = [ //son los campos de la tabla pedido en la BBDD
            'idPedidoProducto', 'fk_idproducto', 'fk_idpedido', 'cantidad'
      ];

      protected $hidden = [];

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idPedidoProducto,
                  fk_idproducto,
                  fk_idpedido,
                  cantidad
                FROM pedido_productos ORDER BY idPedidoProducto ASC";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idPedidoProducto)
      {
            $sql = "SELECT
                  idPedidoProducto,
                  fk_idproducto,
                  fk_idpedido,
                  cantidad
                FROM pedido_productos WHERE idPedidoProducto = $idPedidoProducto";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idPedidoProducto = $lstRetorno[0]->idPedidoProducto;
                  $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
                  $this->fk_idpedido = $lstRetorno[0]->fk_idpedido;
                  $this->cantidad = $lstRetorno[0]->cantidad;

                  return $this;
            }
            return null;
      }


      public function guardar()
      {
            $sql = "UPDATE pedido_productos SET
                fk_idproducto=$this->fk_idproducto,
                fk_idpedido=$this->fk_idpedido,
                cantidad='$this->cantidad'
          WHERE idPedidoProducto=?";
            $affected = DB::update($sql, [$this->idPedidoProducto]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM pedido_productos WHERE idPedidoProducto=?";
            $affected = DB::delete($sql, [$this->idPedidoProducto]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO pedido_productos (
                fk_idproducto,
                fk_idpedido,
                cantidad
            ) VALUES (?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->fk_idproducto,
                  $this->fk_idpedido,
                  $this->cantidad
            ]);
            return $this->idPedidoProducto = DB::getPdo()->lastInsertId();
      }


      public function obtenerPorPedido($idpedido)
      {
            $sql = "SELECT
                  A.idPedidoProducto,
                  A.fk_idproducto,
                  A.fk_idpedido,
                  A.cantidad,
                  B.titulo,
                  B.imagen
            FROM pedido_productos A
            INNER JOIN productos B ON A.fk_idproducto = B.idproducto
            WHERE A.fk_idpedido = $idpedido
            ORDER BY idPedidoProducto ASC";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }
}
