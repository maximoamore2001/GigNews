@extends("web.plantilla")
@section("banner")


<div class="properties mt-4" >
  <div class="container">
    <div>
      <form action="{{ url()->current() }}" method="GET">
        <div class="row pb-3 px-2">
          <div class="col-6 col-sm-11">
            <label for="orden">PRECIO:</label>
            <select class="form-control" name="orden" id="orden">
              <option value="" disabled selected>Seleccionar</option>
              <option value="asc">Menor a Mayor</option>
              <option value="desc">Mayor a Menor</option>
            </select>
          </div>
          <div class="col-6 col-sm-1">
            <br>
            <button style="width: 100%; height: 38px;" type="submit">APLICAR</button>
          </div>
        </div>
      </form>
    </div>

    <?php $orden = isset($_GET['orden']) ? $_GET['orden'] : 'asc'; ?>
    @if ($orden == 'desc') 
    @foreach($aPropiedadesMayorMenor as $propiedadmayormenor)
    <div class="p-2">
      <div class="row properties__box">
        <div class="col-lg-4 col-12 p-0">
          <div class="propertie__img p-0">
            <a <?php echo "href=/propiedad-detallada/$propiedadmayormenor->idpropiedad" ?>><img style="max-width: 412px; max-height: 267px;" src="/files/{{ $propiedadmayormenor->imagen; }}" alt=""></a>
          </div>
        </div>
        <div class="col-lg-8 col-12 py-4">
          <div class="propertie__info">
            <div class="p-1 pt-0 pb-0">
              <h6 style="font-size: 22px;">${{ number_format($propiedadmayormenor->precio, 0, ',', '.') }}</h6>
            </div>
            <div class="p-1 pt-0">
              <div><a class="propertie__title" <?php echo "href='/propiedad-detallada/" . $propiedadmayormenor->idpropiedad . "'" ?>>{{ $propiedadmayormenor->titulo }}</a></div>
              <div><b>{{ $propiedadmayormenor->tipopropiedad }} en {{ $propiedadmayormenor->direccion }}.</b></div>
            </div>
            <ul class="row m-1 properties__information">
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bed"></i> {{ $propiedadmayormenor->cantidadhabitaciones }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bath"></i> {{ $propiedadmayormenor->cantidadbanios }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-car-side"></i> {{ $propiedadmayormenor->garage }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bed"></i> {{ $propiedadmayormenor->cantidadhabitaciones }}</li>
              <li class="p-0 m-0 col-4 col-lg-8"><i class="fa-solid fa-arrows-up-down-left-right"></i> {{ $propiedadmayormenor->areapropiedad }}m<sup>2</sup></li>
            </ul>
            <div class="p-1">
              <div class="col-12"><span>{{ str_limit($propiedadmayormenor->descripcion, $limit = 150, $end = '...') }}</span></div>
            </div>
            <div class="m-0 pt-3">
              <a class="btn__viewproperties" href="/propiedad-detallada/{{ $propiedadmayormenor->idpropiedad }}"></i> ver propiedad</a>
              <a class="btn__whatsapp"  href="https://web.whatsapp.com/" target="_blank"></i><i class="fa-brands fa-whatsapp"></i> whatsapp</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    

    @endif

  </div>
</div>




@endsection

@section("contenido")




<!-- best-deal section -->



<!-- featured section 

<div class="featured section">
  @foreach($aPropiedades as $propiedad)
  @if($propiedad->idpropiedad && $propiedad->idpropiedad == "80")
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="left-image">
          <img src="/files/{{ $propiedad->imagen }}" style="" alt="">
          <a href="property-details.html"><img src="/web/assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="section-heading">
          <h6>| Destacado</h6>
          <h2>{{ $propiedad->titulo }}</h2>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Best useful links ?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                {{ $propiedad->descripcion }}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                How does this work ?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Why is Villa Agency the best ?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="info-table">
          <ul>
            <li>
              <img src="/files/superficie.png" alt="" style="max-width: 52px;">
              <h4>{{ $propiedad->areapropiedad }}m2 <br><span>Superficie Total</span></h4>
            </li>
            <li>
              <img src="/files/habitaciones.png" alt="" style="max-width: 52px;">
              <h4>{{ $propiedad->cantidadhabitaciones }}<br><span>Habitaciones</span></h4>
            </li>
            <li>
              <img src="/files/baños.png" alt="" style="max-width: 52px;">
              <h4>{{ $propiedad->cantidadbanios }}<br><span>Baños</span></h4>
            </li>
            <li>
              <img src="/files/ciudad.png" alt="" style="max-width: 52px;">
              <h4>{{ $propiedad->ciudad }}<br><span>Ciudad</span></h4>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @else("")
  @endif
  @endforeach
</div>
-->
@endsection