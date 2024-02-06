<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
      protected $table = 'sucursales';
      public $timestamps = false;

      protected $fillable = [ //son los campos de la tabla pedido en la BBDD
            'idsucursal', 'nombre', 'direccion', 'telefono', 'mapa', 'horario',
      ];

      protected $hidden = [];

      public function cargarDesdeRequest($request)
      {
            $this->idsucursal = $request->input('id') != "0" ? $request->input('id') : $this->idsucursal;
            $this->nombre = $request->input('txtNombre');
            $this->telefono = $request->input('txtTelefono');
            $this->direccion = $request->input('txtDireccion');
            $this->mapa = $request->input('txtMapa');
            $this->horario = $request->input('txtHorario');
      }

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idsucursal,
                  nombre,
                  direccion,
                  telefono,
                  mapa,
                  horario
                FROM sucursales ORDER BY nombre ASC";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idsucursal)
      {
            $sql = "SELECT
                  idsucursal,
                  nombre,
                  direccion,
                  telefono,
                  mapa,
                  horario
                FROM sucursales WHERE idsucursal = $idsucursal";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idsucursal = $lstRetorno[0]->idsucursal;
                  $this->nombre = $lstRetorno[0]->nombre;
                  $this->direccion = $lstRetorno[0]->direccion;
                  $this->telefono = $lstRetorno[0]->telefono;
                  $this->mapa = $lstRetorno[0]->mapa;
                  $this->horario = $lstRetorno[0]->horario;

                  return $this;
            }
            return null;
      }


      public function guardar()
      {
            $sql = "UPDATE sucursales SET
          nombre='$this->nombre',
          direccion='$this->direccion',
          telefono='$this->telefono',
          mapa='$this->mapa',
          horario='$this->horario'
          WHERE idsucursal=?";
            $affected = DB::update($sql, [$this->idsucursal]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM sucursales WHERE
            idsucursal=?";
            $affected = DB::delete($sql, [$this->idsucursal]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO sucursales (
                nombre,
                telefono,
                horario,
                direccion,
                mapa
            ) VALUES (?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->nombre,
                  $this->telefono,
                  $this->mapa,
                  $this->direccion,
                  $this->horario
            ]);
            return $this->idsucursal = DB::getPdo()->lastInsertId();
      }

      public function obtenerFiltrado()
      {
            $request = $_REQUEST;
            $columns = array(
                  0 => 'nombre',
                  1 => 'direccion',
                  2 => 'telefono',
                  3 => 'mapa',
                  4 => 'horario',
            );
            $sql = "SELECT DISTINCT
                  idsucursal,
                  nombre,
                  direccion,
                  telefono,
                  mapa,
                  horario
                FROM sucursales WHERE 1=1
                ";

            //Realiza el filtrado
            if (!empty($request['search']['value'])) {
                  $sql .= " AND ( nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR direccion LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR telefono LIKE '%" . $request['search']['value'] . "%' )";
                  $sql .= " OR mapa LIKE '%" . $request['search']['value'] . "%' )";
                  $sql .= " OR horario LIKE '%" . $request['search']['value'] . "%' )";
            }
            $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

            $lstRetorno = DB::select($sql);

            return $lstRetorno;
      }
}
