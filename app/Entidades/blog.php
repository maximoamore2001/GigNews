<?php

namespace App\entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blogs';
    public $timestamps = false;

    protected $fillable = [ //son los campos de la tabla producto en la BBDD
        'idblog', 'titulo', 'fecha', 'descripcion', 'imagen', 'segundo_titulo',
         'segunda_descripcion',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request)
    {
        $this->idblog = $request->input('id') != "0" ? $request->input('id') : $this->idblog;
        $this->titulo = $request->input('txtTitulo');
        $this->fecha = $request->input('txtFecha');
        $this->descripcion = $request->input('txtDescripcion');
        $this->imagen = $request->input('txtImagen');
        $this->segundo_titulo = $request->input('txtSegundoTitulo');
        $this->segunda_descripcion = $request->input('txtSegundaDescripcion');
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                idblog,
                titulo,
                fecha,
                descripcion,
                imagen,
                segundo_titulo,
                segunda_descripcion,
            FROM blogs ORDER BY idblog ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idpropiedad)
    {
        $sql = "SELECT
                idblog,
                titulo,
                fecha,
                descripcion,
                imagen,
                segundo_titulo,
                segunda_descripcion,
                FROM blogs WHERE idblog = $idblog";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idblog = $lstRetorno[0]->idblog;
            $this->titulo = $lstRetorno[0]->titulo;
            $this->fecha = $lstRetorno[0]->fecha;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->imagen = $lstRetorno[0]->imagen;
            $this->segundo_titulo = $lstRetorno[0]->segundo_titulo;
            $this->segunda_descripcion = $lstRetorno[0]->segunda_descripcion;
            return $this;
        }
        return null;
    }


    public function guardar()
    {
        $sql = "UPDATE blogs SET
        titulo='$this->titulo',
        fecha='$this->fecha',
        descripcion='$this->descripcion',
        imagen='$this->imagen',
        segundo_titulo='$this->segundo_titulo',
        segunda_descripcion='$this->segunda_descripcion',
          WHERE idblog=?";
        $affected = DB::update($sql, [$this->idblog]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM blogs WHERE
            idblog=?";
        $affected = DB::delete($sql, [$this->idblog]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO blogs (
                titulo,
                fecha,
                descripcion,
                imagen,
                segundo_titulo,
                segunda_descripcion,
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->titulo,
            $this->fecha,
            $this->descripcion,
            $this->imagen,
            $this->segundo_titulo,
            $this->segunda_descripcion,
        ]);
        return $this->idblog = DB::getPdo()->lastInsertId();
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'titulo',
            1 => 'fecha',
            2 => 'descripcion',
            3 => 'imagen',
            4 => 'segundo_titulo',
            5 => 'segunda_descripcion',
        );
        $sql = "SELECT DISTINCT
                idblog,
                titulo,
                fecha,
                descripcion,
                imagen,
                segundo_titulo,
                segunda_descripcion,
            FROM blogs WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( titulo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR fecha LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR descripcion LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR imagen LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR segundo_titulo LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR segunda_descripcion LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }

}
