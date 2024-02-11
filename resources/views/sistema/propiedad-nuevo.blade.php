@extends("plantilla")

@section('titulo')
Nueva Propiedad
@endsection

@section('scripts')
<script>
      globalId = '<?php echo isset($producto->idpropiedad) && $producto->idpropiedad > 0 ? $producto->idpropiedad : 0; ?>';
      <?php $globalId = isset($producto->idpropiedad) ? $producto->idpropiedad : "0"; ?>
</script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
      <li class="breadcrumb-item"><a href="/admin/propiedades">propiedades</a></li>
      <li class="breadcrumb-item active">Modificar</li>
</ol>
<ol class="toolbar">
      <li class="btn-item"><a title="Nuevo" href="/admin/propiedad/nuevo" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
      <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true" onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
      </li>
      @if($globalId > 0)
      <li class="btn-item"><a title="Guardar" href="#" class="fa fa-trash-o" aria-hidden="true" onclick="javascript: $('#mdlEliminar').modal('toggle');"><span>Eliminar</span></a></li>
      @endif
      <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true" onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
</ol>
<script>
      function fsalir() {
            location.href = "/admin/productos";
      }
</script>
@endsection

@section('contenido')

<?php
if (isset($msg)) {
      echo '<div id = "msg"></div>';
      echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
}
?>
<div id="msg"></div>
<div class="panel-body">
      <form ty id="form1" method="POST" enctype="multipart/form-data">
            <div class="row">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                  <input type="hidden" id="id" name="id" class="form-control" value="{{$globalId}}" required>
                  <div class="form-group col-6">
                        <label>Título: *</label>
                        <input type="text" id="txtTitulo" name="txtTitulo" maxlength="50" class="form-control" value="{{ $producto->titulo }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>Precio: *</label>
                        <input type="text" id="txtPrecio" name="txtPrecio" class="form-control" value="{{ $producto->precio }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>Cantidad Habitaciones: *</label>
                        <input type="text" id="txtCantidadHabitaciones" name="txtCantidadHabitaciones" class="form-control" value="{{ $producto->cantidadhabitaciones }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>Cantidad de baños: *</label>
                        <input type="text" id="txtCantidadBanios" name="txtCantidadBanios" class="form-control" value="{{ $producto->cantidadbanios }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>cantidad de plantas: *</label>
                        <input type="text" id="txtCantidadPlantas" name="txtCantidadPlantas" class="form-control" value="{{ $producto->cantidadplantas }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>pais: *</label>
                        <input type="text" id="txtPais" name="txtPais" class="form-control" value="{{ $producto->pais }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>ciudad: *</label>
                        <input type="text" id="txtCiudad" name="txtCiudad" class="form-control" value="{{ $producto->ciudad }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>direccion: *</label>
                        <input type="text" id="txtDireccion" name="txtDireccion" class="form-control" value="{{ $producto->direccion }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>garage: *</label>
                        <input type="text" id="txtGarage" name="txtGarage" class="form-control" value="{{ $producto->garage }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>area de la propiedad: *</label>
                        <input type="text" id="txtAreaPropiedad" name="txtAreaPropiedad" class="form-control" value="{{ $producto->areapropiedad }}" required>
                  </div>
                  <div class="form-group col-6">
                        <label>Descripción: *</label>
                        <input type="text" id="txtDescripcion" maxlength="1200" name="txtDescripcion" class="form-control" value="{{ $producto->descripcion }}">
                  </div>
                  <div class="form-group col-6">
                  <label>tipo de propiedad: *</label>
                  <select type="text" id="lstTipoPropiedad" name="lstTipoPropiedad" class="form-control" value="" required>
                        <option value="" disabled selected>Seleccionar</option>
                        @foreach($aCategorias as $categoria)
                        @if($categoria->idtipopropiedad == $producto->fk_idtipopropiedad)
                        <option selected value="{{$categoria->idtipopropiedad}}">{{$categoria->nombre}}</option>
                        @else
                        <option value="{{$categoria->idtipopropiedad}}">{{$categoria->nombre}}</option>
                        @endif
                        @endforeach
                  </select>
                  </div>
                  <div class="form-group col-6">
                        <label for="imagen">Imagen: <span style="color: black;">(Formato: 4:3 )</span>*</label>
                        <p style="font-size: 1em;"><a href="https://compressnow.com/es/" target="_blank"> Compresor de imágenes</a> (seleccionar <b>70%</b> de compresión)</p>
                        <input type="file" class="form-control-file" id="txtImagen" name="txtImagen">
                  </div>
                  <div class="form-group col-6">
                  </div>
                  <div class="form-group col-12">
                        <img style="width: 30%; border: solid 4px #84B6F4;" src="/files/{{ $producto->imagen }}" alt="">
                        <p>{{ $producto->imagen }}</p>
                  </div>

            </div>
      </form>

      <script>
            $("#form1").validate();

            function guardar() {
                  if ($("#form1").valid()) {
                        modificado = false;
                        form1.submit();
                  } else {
                        $("#modalGuardar").modal('toggle');
                        msgShow("Corrija los errores e intente nuevamente.", "danger");
                        return false;
                  }
            }

            function eliminar() {
                  $.ajax({
                        type: "GET",
                        url: "{{ asset('admin/propiedad/eliminar') }}",
                        data: {
                              id: globalId
                        },
                        async: true,
                        dataType: "json",
                        success: function(data) {
                              if (data.err == 0) {
                                    msgShow(data.mensaje, "success");
                                    $("#btnEnviar").hide();
                                    $("#btnEliminar").hide();
                                    $('#mdlEliminar').modal('toggle');
                              } else {
                                    msgShow(data.mensaje, "danger");
                                    $('#mdlEliminar').modal('toggle');
                              }
                        }
                  });
            }
      </script>


      @endsection