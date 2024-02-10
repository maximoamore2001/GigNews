@extends("plantilla")

@section('titulo')
Nuevo imagen
@endsection

@section('scripts')
<script>
      globalId = '<?php echo isset($imagen->idimagen) && $imagen->idimagen > 0 ? $imagen->idimagen : 0; ?>';
      <?php $globalId = isset($imagen->idimagen) ? $imagen->idimagen : "0"; ?>
</script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
      <li class="breadcrumb-item"><a href="/admin/imagenes">propiedades</a></li>
</ol>
<ol class="toolbar">
      <li class="btn-item"><a title="Nuevo" href="/admin/imagen/nuevo" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
      <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true" onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
      </li>
      @if($globalId > 0)
      <li class="btn-item"><a title="Guardar" href="#" class="fa fa-trash-o" aria-hidden="true" onclick="javascript: $('#mdlEliminar').modal('toggle');"><span>Eliminar</span></a></li>
      @endif
      <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true" onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
      <li class="btn-item"><a title="Recargar" href="#" class="fa fa-refresh" aria-hidden="true" onclick='window.location.replace("/admin/imagen/nuevo");'><span>Recargar</span></a></li>
</ol>
<script>
      function fsalir() {
            location.href = "/admin/imagenes";
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
                  <input type="hidden" id="id" name="id" class="form-control" value="{{$globalId}}" >
                  <div class="form-group col-12">
                        <label>Nombre: *</label>
                        <input type="text" id="txtNombre" name="txtNombre" maxlength="50" class="form-control" value="{{ $imagen->nombre }}" >
                  </div>

                  <div class="form-group col-12">
                  <label>ID propiedad: *</label>
                  <select type="text" id="lstIdpropiedad" name="lstIdpropiedad" class="form-control" value="" >
                        <option value="" disabled selected>Seleccionar</option>
                        @foreach($aPropiedades as $propiedad)
                        @if($propiedad->idpropiedad == $imagen->fk_idpropiedad)
                        <option selected value="{{$propiedad->idpropiedad}}">{{$propiedad->titulo}} (id={{$propiedad->idpropiedad}})</option>
                        @else
                        <option value="{{$propiedad->idpropiedad}}">{{$propiedad->titulo}} | {{$propiedad->idpropiedad}}</option>
                        @endif
                        @endforeach
                  </select>
                  
                  </div>
                  <div class="form-group col-12">
                        <label for="imagen">Imágen: <span style="color: red;">( 4x3 )</span> *</label>
                        <input type="file" class="form-control-file" id="txtImagenes" name="txtImagenes">
                  </div>
                  <div class="form-group col-12">
                        <img style="width: 20%;" src="/files/{{ $imagen->imagen }}" alt="">
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
                        url: "{{ asset('admin/imagen/eliminar') }}",
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