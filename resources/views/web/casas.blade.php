@extends("web.plantilla")
@section("banner")
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <span class="breadcrumb"><a href="/">Inicio</a> / Casas</span>
        <h3>Casas</h3>
      </div>
    </div>
  </div>
</div>
@endsection
@section("contenido")
<div class="properties section">
  <div class="container">

    <div class="row">
      @foreach($aPropiedades as $propiedad)
      @if($propiedad->fk_idtipopropiedad == "1")
      <div class="col-lg-4 col-md-6">
        <div class="item" style="min-height: 570px;">
          <a <?php echo "<a href='/propiedad-detallada/" . $propiedad->idpropiedad . "'>" ?>  ><img style="max-width: 100%;" src="/files/{{ $propiedad->imagen; }}" alt=""></a>
          <h6>$ {{ number_format($propiedad->precio, 0, ',', '.') }}</h6>
          <h4 style="min-height: 50px; max-width: 58%;"><a href="property-details.html">{{ $propiedad->titulo }}</a></h4>
          <ul>
            <li>Habitaciones: <span>{{ $propiedad->cantidadhabitaciones }}</span></li>
            <li>Baños: <span>{{ $propiedad->cantidadbanios }}</span></li>
            <li>Área: <span>{{ $propiedad->areapropiedad }} m2</span></li>
            <li>Plantas: <span>{{ $propiedad->cantidadplantas }}</span></li>
            <li>Garages: <span>{{ $propiedad->garage }}</span></li>
          </ul>
          <div class="main-button">
            <a href="property-details.html">Contactarse</a>
          </div>
        </div>
      </div>
      @else("")
      @endif
      @endforeach
    </div>
  </div>
</div>
@endsection