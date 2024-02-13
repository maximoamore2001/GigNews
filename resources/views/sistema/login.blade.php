<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <title>{{ $titulo }} -  {{ env('APP_NAME') }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/funciones_generales.js') }}"></script>
  </head>
  
<body class="" style="background-color: #1e1e1e;">
    <div  style="margin-top: 13%;" class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header"  style="background-color: #32753f; font-size: 18px; color:white;">Acceso</div>
        <div class="card-body" >
          <?php
          if (isset($msg)) {
              echo '<div id = "msg"></div>';
              echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
          }
          ?>
          <form name="fr" class="form-signin" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <div class="form-group">
              <div class="form-label-group">
                <input style="border: solid 1px #000;" type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Usuario" required autofocus>
                <label for="txtUsuario">Usuario</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input style="border: solid 1px #000;" type="password" id="txtClave" name="txtClave" class="form-control" placeholder="Clave" required>
                <label for="txtClave">Clave</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Recordar clave
                </label>
              </div>
            </div>
            <button style="background-color: #32753f; color:white;" class="btn btn-block" type="submit">Entrar</button>
          </form><br>
          <div class="text-center">
            <a class="d-block small" style=" color: #000; font-size:15px;" href="/admin/recupero-clave">Recuperar clave</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>