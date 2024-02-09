<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Administración</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="/css/estilos.css" rel="stylesheet">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('images/favicon.png') }}">
  <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>
  <script src="{{ asset('js/jquery.validate.js') }}"></script>
  <script src="{{ asset('js/localization/messages_es.js') }}"></script>
  <script src="{{ asset('js/funciones_generales.js') }}"></script>
  <script src="{{ asset('js/bootstrap-select.js') }}"></script>

	<script>
	    function cambiarGrupo() {
	        idGrupo = $("#lstGrupo option:selected").val();
	        $.ajax({
	            type: "GET",
	            url: "{{ asset('grupo/setearGrupo') }}",
	            data: { id:idGrupo },
	            async: true,
	            dataType: "json",
	            success: function (data) {
	                if (data.err = "0") {
	                  if(window.location.pathname == "/admin/login")
	                    location.href ="/admin";
	                  else
	                    location.href ="/admin";
                      //location.reload();
	                } else {
	                    alert("Error al cambiar el grupo");
	                }
	            }
	        });
	    }
	</script>
    @yield('scripts')
</head>


<!-- NUEVO BODY -->





<!-- ANTIGUO BODY -->


  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark static-top" style="background-color: #000;">
      <a class="navbar-brand mr-1" href="/">Administración</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
            </div>
          </form>
        </li>
         <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i> {{ Session::get("usuario_nombre") }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="/admin/usuarios/{{ Session::get("usuario") }}">Cuenta de usuario</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Cerrar sesi&oacute;n</a>
          </div>
        </li>
      </ul>
    </nav>

    <!--Side bar -->
    <div id="wrapper">
      <ul class="sidebar  navbar-nav" style="background-color: #84b6f4;">
      @for ($i = 0; Session::get('array_menu') && $i < count(Session::get('array_menu')); $i++)
          @if (Session::get('array_menu')[$i]->id_padre == 0)
              
              @if(Session::get('array_menu')[$i]->url != "")
              <li class="nav-item">
                <a class="nav-link" href="{{ Session::get('array_menu')[$i]->url }}">
                  <i style="color:#000; font-weight: 800; font-size: 17px; " class="{{ Session::get('array_menu')[$i]->css }}"></i>
                  <span style="color:#000; font-weight: 800;"> {{ Session::get('array_menu')[$i]->nombre }}</span>
                </a>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  href="#" id="{{ Session::get('array_menu')[$i]->idmenu }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="color:#000; font-weight: 800; font-size: 17px; " class="{{ Session::get('array_menu')[$i]->css }}"></i>
                  <span  style="color:#000; font-weight: 800;"> {{ Session::get('array_menu')[$i]->nombre }}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="{{ Session::get('array_menu')[$i]->idmenu }}">
                 @for ($j = 0; $j < count(Session::get('array_menu')); $j++)
                    @if(Session::get('array_menu')[$j]->id_padre == Session::get('array_menu')[$i]->idmenu)
                      <a  class="dropdown-item" href="{{ Session::get('array_menu')[$j]->url }}">{{ Session::get('array_menu')[$j]->nombre }}</a>
                    @endif
                  @endfor
                </div>
              @endif
              </li>
          @endif
      @endfor
      </ul>
      <div id="content-wrapper">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@yield('titulo')</h1>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
          @yield('breadcrumb')
          </div>
        </div>
          @yield('contenido')
        </div>
        </div>
        <!-- /.container-flui -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>{{ env('APP_NAME') }} - {{ env('ORG_NAME') }}</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="modalGuardar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">¿Guardar cambios?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Seleccione Si para guardar y volver a la pantalla anterior.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <a class="btn btn-primary" href="#" onclick="guardar();">Sí</a>
              </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mdlEliminar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Eliminar seguro?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Seleccione Si para eliminar y volver a la pantalla anterior.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <button class="btn btn-primary" type="button" onclick="eliminar();">Sí</button>
              </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSalir" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">¿Salir sin guardar los cambios?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Seleccione Si para salir y volver a la pantalla anterior.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <a class="btn btn-primary" href="#" onclick="fsalir();">Sí</a>
              </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Salir del sistema?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccciona "Cerrar sesi&oacute;n" si deseas terminar la sesi&oacute;n actual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="/admin/logout">Cerrar sesi&oacute;n</a>
          </div>
        </div>
      </div>
    </div>
    <script>
    var modificado = false;
    $("input, select").change(function () {
        if(this.id != 'lstGrupo')
        modificado = true;  
    }); 
    window.onbeforeunload = function() {
        if (modificado)  
            return 'Puede haber cambios sin guardar en el formulario, ¿Desea salir de todas formas?'; 
    }
    </script>
  </body>
</html>