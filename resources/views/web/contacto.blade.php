@extends("web.plantilla")
@section("contenido")

<div class="contact-page section">
  <div class="container">
    <div class="row">
      @if(isset($msg))
      <div class="row">
        <div class="col-12 alert alert-{{ $msg['ESTADO'] }} text-center" role="alert">
          {{ $msg["MSG"] }}
        </div>
      </div>
      @endif
      <div class="col-lg-12">
        <div>
          <form id="contact-form" class="m-0" action="" method="POST">
            <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
              <div class="col-lg-12">
                <fieldset>
                  <input class="animated fadeIn " type="name" name="txtNombre" id="txtNombre" placeholder="Nombre..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input class="animated fadeIn " type="subject" name="txtApellido" id="txtApellido" placeholder="Apellido..." autocomplete="on">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>

                  <input class="animated fadeIn " type="text" name="txtCorreo" id="txtCorreo" pattern="[^ @]*@[^ @]*" placeholder="Mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea class="animated fadeIn " name="txtTextArea" id="txtTextArea" placeholder="Mensaje"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button class="animated fadeIn " type="submit btn btn-primary" class="orange-button">ENVIAR</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-12 col-lg-6  py-3">
        <div class="shadow p-3">
          <h6>0800-2020-2020<br><span class="colour__primary">Número telefónico</span></h6>
        </div>
      </div>
      <div class="col-12 col-lg-6 py-3">
        <div class=" shadow p-3">
          <h6>Terranova@gmail.com<br><span class="colour__primary">Correo electrónico</span></h6>
        </div>
      </div>
      <div class="col-lg-12 ">
        <div id="map" style="margin: 0;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d66903.23202208424!2d-60.766331442890476!3d-32.933850152152964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab16355e7da7%3A0x46ca798240386515!2sCrestale%20Propiedades!5e1!3m2!1sen!2sth!4v1707725135145!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection