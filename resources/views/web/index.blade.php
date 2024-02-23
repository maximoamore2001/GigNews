@extends("web.plantilla")
@section("banner")


<div class="properties mt-4" >
  <div class="container">
    <div>
      <form action="{{ url()->current() }}" method="GET">
        <div class="row pb-3 px-2">
          <div class="col-6">
            <label for="orden">PRECIO:</label>
            <select class="form-control" name="orden" id="orden">
              <option value="" disabled selected>Seleccionar</option>
              <option value="asc">Menor a Mayor</option>
              <option value="desc">Mayor a Menor</option>
            </select>
          </div>

          <!--
          <div class="col-3">
            <label for="orden">HABITACIONES:</label>
            <select class="form-control" name="orden" id="orden">
              <option value="" disabled selected>Seleccionar</option>
              <option value="asc">Menor a Mayor</option>
              <option value="desc">Mayor a Menor</option>
            </select>
          </div>
          <div class="col-3">
            <label for="orden">TIPO:</label>
            <select class="form-control" name="orden" id="orden">
              <option value="" disabled selected>Seleccionar</option>
              <option value="asc">Menor a Mayor</option>
              <option value="desc">Mayor a Menor</option>
            </select>
          </div>
-->
          <div class="col-6">
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
            <div class="btn__properties m-0 pt-3">
              <a href="/propiedad-detallada/{{ $propiedadmayormenor->idpropiedad }}"></i> ver propiedad</a>
              <a  href="https://web.whatsapp.com/" target="_blank"></i><i class="fa-brands fa-whatsapp"></i> whatsapp</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    @elseif ($orden == 'asc')

    @foreach($aPropiedadesMenorMayor as $propiedadmenormayor)
    <div class="p-2">
      <div class="row properties__box">
        <div class="col-lg-4 col-12 p-0">
          <div class="propertie__img p-0">
            <a <?php echo "href=/propiedad-detallada/$propiedadmenormayor->idpropiedad" ?>><img style="max-width: 412px; max-height: 267px;" src="/files/{{ $propiedadmenormayor->imagen; }}" alt=""></a>
          </div>
        </div>
        <div class="col-lg-8 col-12 py-4">
          <div class="propertie__info">
            <div class="p-1 pt-0 pb-0">
              <h6 style="font-size: 22px;">${{ number_format($propiedadmenormayor->precio, 0, ',', '.') }}</h6>
            </div>
            <div class="p-1 pt-0">
              <div><a class="propertie__title" <?php echo "href='/propiedad-detallada/" . $propiedadmenormayor->idpropiedad . "'" ?>>{{ $propiedadmenormayor->titulo }}</a></div>
              <div><b>{{ $propiedadmenormayor->tipopropiedad }} en {{ $propiedadmenormayor->direccion }}.</b></div>
            </div>
            <ul class="row m-1 properties__information">
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bed"></i> {{ $propiedadmenormayor->cantidadhabitaciones }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bath"></i> {{ $propiedadmenormayor->cantidadbanios }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-car-side"></i> {{ $propiedadmenormayor->garage }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bed"></i> {{ $propiedadmenormayor->cantidadhabitaciones }}</li>
              <li class="p-0 m-0 col-4 col-lg-8"><i class="fa-solid fa-arrows-up-down-left-right"></i> {{ $propiedadmenormayor->areapropiedad }}m<sup>2</sup></li>
            </ul>
            <div class="p-1">
              <div class="col-12"><span>{{ str_limit($propiedadmenormayor->descripcion, $limit = 150, $end = '...') }}</span></div>
            </div>
            <div class="btn__properties m-0 pt-3">
              <a href="/propiedad-detallada/{{ $propiedadmenormayor->idpropiedad }}"></i> ver propiedad</a>
              <a  href="https://web.whatsapp.com/" target="_blank"></i><i class="fa-brands fa-whatsapp"></i> whatsapp</a>
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

<div class="section best-deal">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="section-heading">
          <h2>| Propiedades destacadas</h2>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="tabs-content">
          <div class="row">
            <div class="nav-wrapper ">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Departamentos</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Casas</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Oficinas</button>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                <div class="row">
                  @foreach($aPropiedades as $propiedad)
                  @if($propiedad->idpropiedad && $propiedad->idpropiedad == "79")
                  <div class="col-lg-3">
                    <div class="info-table">
                      <ul>
                        <li>Superficie <span>{{ $propiedad->areapropiedad }} m2</span></li>
                        <li>Baños <span>{{ $propiedad->cantidadbanios }}</span></li>
                        <li>Habitaciones <span>{{ $propiedad->cantidadhabitaciones }}</span></li>
                        <li>País <span>{{ $propiedad->pais }}</span></li>
                        <li>Ciudad <span>{{ $propiedad->ciudad }}</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="/files/{{ $propiedad->imagen }}" alt="">
                  </div>
                  <div class="col-lg-3">
                    <h4>Información extra</h4>
                    <p class="text__description">{{ $propiedad->descripcion }}
                      <br>
                    </p>
                    <div class="btn__more">
                      <a href="/propiedad-detallada/{{ $propiedad->idpropiedad }}"></i> Ver propiedad</a>
                    </div>
                  </div>
                  @else ("")
                  @endif
                  @endforeach
                </div>
              </div>
              <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                <div class="row">
                  @foreach($aPropiedades as $propiedad)
                  @if($propiedad->idpropiedad && $propiedad->idpropiedad == "77")
                  <div class="col-lg-3">
                    <div class="info-table">
                      <ul>
                        <li>Superficie <span>{{ $propiedad->areapropiedad }} m2</span></li>
                        <li>Baños <span>{{ $propiedad->cantidadbanios }}</span></li>
                        <li>Habitaciones <span>{{ $propiedad->cantidadhabitaciones }}</span></li>
                        <li>País <span>{{ $propiedad->pais }}</span></li>
                        <li>Ciudad <span>{{ $propiedad->ciudad }}</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="/files/{{ $propiedad->imagen }}" alt="">
                  </div>
                  <div class="col-lg-3">
                    <h4>Información extra</h4>
                    <p class="text__description">{{ $propiedad->descripcion }}
                      <br>
                    </p>
                    <div class="btn__more">
                      <a href="/propiedad-detallada/{{ $propiedad->idpropiedad }}"></i> Ver propiedad</a>
                    </div>
                  </div>
                  @else ("")
                  @endif
                  @endforeach
                </div>
              </div>
              <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                <div class="row">
                  @foreach($aPropiedades as $propiedad)
                  @if($propiedad->idpropiedad && $propiedad->idpropiedad == "82")
                  <div class="col-lg-3">
                    <div class="info-table">
                      <ul>
                        <li>Superficie <span>{{ $propiedad->areapropiedad }} m2</span></li>
                        <li>Baños <span>{{ $propiedad->cantidadbanios }}</span></li>
                        <li>Habitaciones <span>{{ $propiedad->cantidadhabitaciones }}</span></li>
                        <li>País <span>{{ $propiedad->pais }}</span></li>
                        <li>Ciudad <span>{{ $propiedad->ciudad }}</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="/files/{{ $propiedad->imagen }}" alt="">
                  </div>
                  <div class="col-lg-3">
                    <h4>Información extra</h4>
                    <p class="text__description">{{ $propiedad->descripcion }}
                      <br>
                    </p>
                    <div class="btn__more">
                      <a href="/propiedad-detallada/{{ $propiedad->idpropiedad }}"></i> Ver propiedad</a>
                    </div>
                  </div>
                  @else ("")
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



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

<!-- contact section -->

<div class="contact" style="margin-top: 50px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="section-heading text-center">
          <h2>| Contacto</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="contact-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d66903.23202208424!2d-60.766331442890476!3d-32.933850152152964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab16355e7da7%3A0x46ca798240386515!2sCrestale%20Propiedades!5e1!3m2!1sen!2sth!4v1707725135145!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="item phone">
              <img src="/web/assets/images/phone-icon.png" alt="" style="max-width: 52px;">
              <h6>0800-2020-2020<br><span>Numero telefónico</span></h6>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="item email">
              <img src="/web/assets/images/email-icon.png" alt="" style="max-width: 52px;">
              <h6>info@salomon.co<br><span>Email</span></h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <form id="contact-form" action="" method="post">
          <div class="row">
            <div class="col-lg-12">
              <fieldset>
                <input type="text" name="name" id="name" placeholder="nombre..." autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="text" name="apellido" id="apellido" placeholder="apellido..." autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="correo electrónico..." required="">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <textarea name="message" id="message" placeholder="mensaje..."></textarea>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" id="form-submit" class="orange-button">Enviar</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection