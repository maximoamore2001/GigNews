@extends("web.plantilla")
@section("banner")


@endsection
@section("contenido")
<div class="featured py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="left-image">
          <img src="/files/arquitectos-colegas-trabajando-juntos-proyecto.jpg" alt="">
          <a href="property-details.html"><img src="/web/assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="section-heading mb-2">
          <h6>| Acerca de Terranova</h6>
          <h2 class="animated fadeIn " style="color: #1e1e1e;">Expertos en asesoramiento inmobiliario</h2>
        </div>
        <div class="px-3 ">
          <p class="text__description animated fadeIn " style="color: #1e1e1e;">Terranova Inmobiliaria es una reconocida empresa del rubro inmobiliario en Rosario. <br> Especializada en la venta y alquiler de propiedades residenciales y comerciales, Terranova se destaca por ofrecer un servicio integral y personalizado a sus clientes.<br> Con una amplia experiencia en el mercado y un equipo de profesionales altamente capacitados, esta inmobiliaria se ha ganado la confianza de quienes buscan comprar, vender o alquilar propiedades en la ciudad. Además de su sólida reputación, Terranova se distingue por su compromiso con la excelencia y la satisfacción del cliente, brindando asesoramiento experto en cada paso del proceso inmobiliario.<br> Si buscas una empresa confiable y comprometida para tus necesidades inmobiliarias en Rosario, Terranova es una excelente opción.</p>
        </div>
      </div>

    </div>
  </div>
</div>



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
                  <div class="col-lg-3 section__information">
                    <h4 class="extra__information mb-3">Información extra:</h4>
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
                  <div class="col-lg-3 section__information">
                    <h4 class="extra__information mb-3">Información extra:</h4>
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
                  <div class="col-lg-3 section__information">
                    <h4 class="extra__information mb-3">Información extra:</h4>
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




<div class="video">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="section-heading text-center">
          <h6>| Ver video</h6>
          <h2>Obtenga una visión más cercana</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="video-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="video-frame">
          <img src="/web/assets/images/video-frame.jpg" alt="">
          <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container contact-page section">
  <div class="row">
    <div class="d-none d-sm-none d-md-block col-lg-3"></div>
    <div class="col-lg-6 col-12 pt-5 mb-0">
      <div>
        <form class="m-0" action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
          <div class="row">
            <div class="col-lg-12">
              <h5 class="pb-4">Trabajá con nosotros:</h5>
              <fieldset>
                <input type="text" class="form-control mb-3" name="txtNombre" id="txtNombre" placeholder="Nombre..." autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="text" class="form-control mb-3" name="txtApellido" id="txtApellido" placeholder="Apellido..." autocomplete="on">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="text" class="form-control mb-3" name="txtWhatsapp" id="txtWhatsapp" placeholder="Whatsapp..." autocomplete="on">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <input type="text" class="form-control mb-3" name="txtCorreo" id="txtCorreo" pattern="[^ @]*@[^ @]*" placeholder="Mail..." required="">
              </fieldset>
            </div>
            <div class="col-lg-12">
              <input style="background: none;" class="form-control mb-3" type="file" name="archivoCv" id="archivoCv" required="">
            </div>

            <div class="col-lg-12">
              <fieldset>
                <button type="submit" class="btn__back">ENVIAR</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="d-none d-sm-none d-md-block col-lg-3"></div>
  </div>
</div>

@endsection