@extends("web.plantilla")
@section("banner")

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <span class="breadcrumb"><a href="#">Home</a> / Single Property</span>
        <h3>Single Property</h3>
      </div>
    </div>
  </div>
</div>

@endsection
@section("contenido")

<div class="single-property section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="main-image">
          <div class="main-banner">
            <div class="owl-carousel owl-banner">
              <img src="/files/{{ $producto->imagen }}" alt="">
              <img src="/files/{{ $producto->imagen2 }}" alt="">
              <img src="/files/{{ $producto->imagen3 }}" alt="">
              <img src="/files/{{ $producto->imagen4 }}" alt="">
              <img src="/files/{{ $producto->imagen5 }}" alt="">
            </div>
          </div>
        </div>
        <div class="main-content">
          <span class="category">{{ $producto->direccion }}</span>
          <h4> {{ $producto->titulo }} </h4>
          <p style="font-size: 1.3em;"> {{ $producto->descripcion }} </p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-table">
          <ul>
            <li>
              <img src="/files/bolsa-de-dinero.png" alt="" style="max-width: 52px;">
              <h4>{{ number_format($producto->precio, 0, ',', '.') }}<br><span>Precio</span></h4>
            </li>
            <li>
              <img src="/files/superficie.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->areapropiedad }}m2 <br><span>Superficie Total</span></h4>
            </li>
            <li>
              <img src="/files/habitaciones.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->cantidadhabitaciones }}<br><span>Habitaciones</span></h4>
            </li>
            <li>
              <img src="/files/baños.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->cantidadbanios }}<br><span>Baños</span></h4>
            </li>
            <li>
              <img src="/files/garage.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->garage }}<br><span>Vehículos</span></h4>
            </li>
            <li>
              <img src="/files/ciudad.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->ciudad }}<br><span>Ciudad</span></h4>
            </li>
            <li>
              <img src="/files/pais.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->pais }}<br><span>País</span></h4>
            </li>
            <li>
              <img src="/files/plantas.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->cantidadplantas }}<br><span>Plantas</span></h4>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection