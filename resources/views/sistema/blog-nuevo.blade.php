@extends("plantilla")

@section('titulo')
Nueva Categoría
@endsection

@section('scripts')
<script>
      globalId = '<?php echo isset($blog->idblog) && $blog->idblog > 0 ? $blog->idblog : 0; ?>';
      <?php $globalId = isset($blog->idblog) ? $blog->idblog : "0"; ?>
</script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
      <li class="breadcrumb-item"><a href="/admin/blog">Blogs</a></li>
      <li class="breadcrumb-item active">Modificar</li>
</ol>
<ol class="toolbar">
      <li class="btn-item"><a title="Nuevo" href="/admin/blog/nuevo" class="fa fa-plus-circle"
                  aria-hidden="true"><span>Nuevo</span></a></li>
      <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true"
                  onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
      </li>
      @if($globalId > 0)
            <li class="btn-item"><a title="Guardar" href="#" class="fa fa-trash-o" aria-hidden="true"
                              onclick="javascript: $('#mdlEliminar').modal('toggle');"><span>Eliminar</span></a></li>
      @endif
      <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true"
                  onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
</ol>
<script>
      function fsalir() {
            location.href = "/admin/blog";
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
      <form id="form1" method="POST" enctype="multipart/form-data">
            <div class="row">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                  <input type="hidden" id="id" name="id" class="form-control" value="{{$globalId}}" required>

                  <div class="form-group col-6">

                        <div class="">
                              <label>Título: *</label>
                              <input type="text" id="txtTitulo" name="txtTitulo" class="form-control"
                              value="{{ $blog->titulo }}" required>
                        </div>


                        <div class="mt-3">
                              <label>Fecha: *</label>
                              <input type="date" id="txtFecha" name="txtFecha" class="form-control" value="{{ $blog->fecha }}"
                              required>
                        </div>

                        <div class="mt-3">
                              <label>Descripción: *</label>
                              <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control"
                                    value="{{ $blog->descripcion }}" required>
                        </div>

                        <div class="mt-3">
                              <label>Segundo título(opcional): *</label>
                              <input type="text" id="txtSegundoTitulo" name="txtSegundoTitulo" class="form-control"
                                    value="{{ $blog->segundo_titulo }}">
                        </div>
                        <div class="mt-3">
                              <label>Segunda descripción: *</label>
                              <input type="text" id="txtSegundaDescripcion" name="txtSegundaDescripcion"
                                    class="form-control" value="{{ $blog->segunda_descripcion }}">
                        </div>

                        <div class="mt-3">
                              <label for="imagen">Imagen: <span style="color: black;">(Formato: 4:3 )</span>*</label>
                              <p style="font-size: 1em;"><a href="https://compressnow.com/es/" target="_blank">
                                          Compresor de imágenes</a> (seleccionar <b>70%</b> de compresión)</p>
                              <input type="file" class="form-control-file" id="txtImagen" name="txtImagen">
                              <input hidden type="text" class="form-control-file" value="{{ $blog->imagen }}"
                                    id="txtImagen" name="txtImagen"> <!-- [solución a problema de la imagen] -->
                              <div class="form-group col-12">
                                    <img style="width: 30%; border: solid 4px #84B6F4;" src="/files/{{ $blog->imagen }}"
                                          alt="">
                                    <p>{{ $blog->imagen }}</p>
                              </div>
                        </div>

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
                        url: "{{ asset('admin/blog/eliminar') }}",
                        data: { id: globalId },
                        async: true,
                        dataType: "json",
                        success: function (data) {
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