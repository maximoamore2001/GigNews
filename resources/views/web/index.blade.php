@extends("web.plantilla")
@section("banner")


<div class="properties mt-4">
  <div class="container">
    <div>
      <form action="{{ url()->current() }}" method="GET">
        <div class="row pb-3 px-2">
          <div class="col-6 col-sm-11">
            <label for="orden">PRECIO: </label>
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
    @if ($orden == '') 
    @foreach($aPropiedades as $propiedad)
    <div class="p-2">
      <div class="row properties__box">
        <div class="col-lg-4 col-12 p-0">
          <div class="propertie__img p-0">
            <a href="/propiedad-detallada/{{ $propiedad->idpropiedad }}">
              <img style="max-width: 412px; max-height: 267px;" src="/files/{{ $propiedad->imagen }}" alt="">
            </a>
          </div>
        </div>
        <div class="col-lg-8 col-12 py-4">
          <div class="propertie__info">
            <div class="p-1 pt-0 pb-0">
              <h6 style="font-size: 22px;">${{ number_format($propiedad->precio, 0, ',', '.') }}</h6>
            </div>
            <div class="p-1 pt-0">
              <div>
                <a class="propertie__title" href="/propiedad-detallada/{{ $propiedad->idpropiedad }}">
                  {{ $propiedad->titulo }}
                </a>
              </div>
              <div><b>{{ $propiedad->tipopropiedad }} en {{ $propiedad->direccion }}.</b></div>
            </div>
            <ul class="row m-1 properties__information">
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bed"></i> {{ $propiedad->cantidadhabitaciones }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bath"></i> {{ $propiedad->cantidadbanios }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-car-side"></i> {{ $propiedad->garage }}</li>
              <li class="p-0 m-0 col-2 col-lg-1"><i class="fa-solid fa-bed"></i> {{ $propiedad->cantidadhabitaciones }}</li>
              <li class="p-0 m-0 col-4 col-lg-8"><i class="fa-solid fa-arrows-up-down-left-right"></i> {{ $propiedad->areapropiedad }}m<sup>2</sup></li>
            </ul>
            <div class="p-1">
              <div class="col-12 d-none d-sm-none d-md-block"><span>{{ str_limit($propiedad->descripcion, 150, '...') }}</span></div>
            </div>
            <div class="m-0 pt-3">
              <a class="btn__viewproperties" href="/propiedad-detallada/{{ $propiedad->idpropiedad }}">ver propiedad</a>
              <a class="btn__whatsapp" href="https://web.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i> whatsapp</a>
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
              <div class="col-12 d-none d-sm-none d-md-block"><span>{{ str_limit($propiedadmenormayor->descripcion, $limit = 150, $end = '...') }}</span></div>
            </div>
            <div class=" m-0 pt-3">
              <a class="btn__viewproperties" href="/propiedad-detallada/{{ $propiedadmenormayor->idpropiedad }}"></i> ver propiedad</a>
              <a class="btn__whatsapp"  href="https://web.whatsapp.com/" target="_blank"></i><i class="fa-brands fa-whatsapp"></i> whatsapp</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    @elseif ($orden == 'desc')

@foreach($aPropiedadesMayorMenor as $propiedadmayormenor)
    <div class=" p-2">
      <div class=" row properties__box">
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
              <div class="col-12 d-none d-sm-none d-md-block"><span>{{ str_limit($propiedadmayormenor->descripcion, $limit = 150, $end = '...') }}</span></div>
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

<div class="container">
<div class="row pagination mt-4">
      <div class="col-12">
          {{ $aPropiedades->links('pagination::bootstrap-4') }}
        </div>
    </div>
    </div>



@endsection

@section("contenido")



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