<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Terranova</title>

    <!-- Bootstrap core CSS -->
    <link href="/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/web/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/web/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="/web/assets/css/owl.css">
    <link rel="stylesheet" href="/web/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>
  


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <h1>Terranova</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/"  class="<?php echo (Request::path() == "/") ? 'active' : ""; ?> ">Inicio</a></li>
                      <li><a href="/casas" class="<?php echo (Request::path() == "casas") ? 'active' : ""; ?>">Casas</a></li>
                      <li><a href="/departamentos" class="<?php echo (Request::path() == "departamentos") ? 'active' : ""; ?>">Departamentos</a></li>
                      <li><a href="/oficinas" class="<?php echo (Request::path() == "oficinas") ? 'active' : ""; ?>">Oficinas</a></li>
                      <li><a href="/nosotros"  class="<?php echo (Request::path() == "/nosotros") ? 'active' : ""; ?> ">Nosotros</a></li>
                      <li><a href="/contacto" class="<?php echo (Request::path() == "contacto") ? 'active' : ""; ?>"><i style="color: #fff;" class="fa fa-calendar"></i> Contactarse</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  @yield("banner")

  @yield("contenido")

  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved. 
        
        Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a> Distribution: <a href="https://themewagon.com">ThemeWagon</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="/web/vendor/jquery/jquery.min.js"></script>
  <script src="/web/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/web/assets/js/isotope.min.js"></script>
  <script src="/web/assets/js/owl-carousel.js"></script>
  <script src="/web/assets/js/counter.js"></script>
  <script src="/web/assets/js/custom.js"></script>

  </body>
</html>