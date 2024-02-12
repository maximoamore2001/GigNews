@extends("web.plantilla")
@section("banner")


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
              @foreach($aImagenes as $imagen)
              @if($producto->idpropiedad == $imagen->fk_idpropiedad )
              <img src="/files/{{ $imagen->imagen }}" alt="">
              @else ''
              @endif
              @endforeach
            </div>
          </div>
        </div>
        <div class="main-content">
          <span class="category mt-0">{{ $producto->direccion }} | {{ $producto->ciudad }} | {{ $producto->pais }}</span>
          <h4> {{ $producto->titulo }} </h4>
          <p style="font-size: 1.1em; width: 95%;"> {{ $producto->descripcion }} </p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="info-table">
          <ul>
            <li>
              <img src="/files/bolsa-de-dinero.png" alt="" style="max-width: 52px;">
              <h4>U$S {{ number_format($producto->precio, 0, ',', '.') }}<br><span>Precio</span></h4>
            </li>
            <li>
              <img src="/files/superficie.png" alt="" style="max-width: 52px;">
              <h4>{{ $producto->areapropiedad }} m2 <br><span>Superficie Total</span></h4>
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