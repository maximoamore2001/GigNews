@extends("web.plantilla")
@section("banner")
<!-- main section -->

<div class="main-banner">
  <div class="owl-carousel owl-banner">
    <div class="item item-1">
      <div class="header-text">
        <span class="category">Buenos aires, <em>Argentina</em></span>
        <h2>Comprá <br>la mejor <br>casa para tu familia</h2>
      </div>
    </div>
    <div class="item item-2">
      <div class="header-text">
        <span class="category">Montevideo, <em>Uruguay</em></span>
        <h2>Comprá<br> el mejor <br>departamento para ti</h2>
      </div>
    </div>
    <div class="item item-3">
      <div class="header-text">
        <span class="category">Rosario, <em>Argentina</em></span>
        <h2>Comprá <br> la mejor <br>oficina para trabajar</h2>
      </div>
    </div>
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
          <h6>| Tipos de propiedades</h6>
          <h2>Tenemos todo lo que necesitas</h2>
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
                        <li>Garages <span>{{ $propiedad->garage }}</span></li>
                        <li>Ciudad <span>{{ $propiedad->ciudad }}</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="/files/{{ $propiedad->imagen }}" alt="">
                  </div>
                  <div class="col-lg-3">
                    <h4>Información extra</h4>
                    <p>{{ $propiedad->descripcion }}
                      <br>
                    </p>
                    <div class="icon-button">
                      <a href="property-details.html"><i class="fa fa-calendar"></i> Contactar</a>
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
                        <li>Garages <span>{{ $propiedad->garage }}</span></li>
                        <li>Ciudad <span>{{ $propiedad->ciudad }}</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="/files/{{ $propiedad->imagen }}" alt="">
                  </div>
                  <div class="col-lg-3">
                    <h4>Información extra</h4>
                    <p>{{ $propiedad->descripcion }}
                      <br>
                    </p>
                    <div class="icon-button">
                      <a href="property-details.html"><i class="fa fa-calendar"></i> Contactar</a>
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
                  @if($propiedad->idpropiedad && $propiedad->idpropiedad == "72")
                  <div class="col-lg-3">
                    <div class="info-table">
                      <ul>
                        <li>Superficie <span>{{ $propiedad->areapropiedad }} m2</span></li>
                        <li>Baños <span>{{ $propiedad->cantidadbanios }}</span></li>
                        <li>Habitaciones <span>{{ $propiedad->cantidadhabitaciones }}</span></li>
                        <li>Garages <span>{{ $propiedad->garage }}</span></li>
                        <li>Ciudad <span>{{ $propiedad->ciudad }}</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="/files/{{ $propiedad->imagen }}" alt="">
                  </div>
                  <div class="col-lg-3">
                    <h4>Información extra</h4>
                    <p>{{ $propiedad->descripcion }}
                      <br>
                    </p>
                    <div class="icon-button">
                      <a href="property-details.html"><i class="fa fa-calendar"></i> Contactar</a>
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

<div class="properties section">
  <div class="container">
  <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="section-heading text-center">
          <h2>| Propiedades</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($aPropiedades as $propiedad)
      @if($propiedad->fk_idtipopropiedad)
      <div class="col-lg-4 col-md-6">
        <div class="item" style="min-height: 600px;">
          <a <?php echo "<a href='/propiedad-detallada/" . $propiedad->idpropiedad . "'>" ?>  ><img style="max-width: 100%; height: 267px;" src="/files/{{ $propiedad->imagen; }}" alt=""></a>
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

<div class="contact section">
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
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
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