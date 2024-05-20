@extends("web.plantilla")
@section("contenido")

<div class="contact-page section">
      <div class="container">
            <div class="row">
                  <div class="col-12">
                        <h2>Tasaciones</h2>
                        <p class="m-0 pb-4">Si desea conocer el valor de su propiedad, complete sus datos y describa las características del inmueble. <br> Un tasador de <b>Terranova</b> se pondrá en contacto con usted dentro de las 24 horas.</p>
                  </div>
                  <div class="col-lg-12">
                        <div>
                              <form id="contact-form" class="m-0" action="" method="post">
                                    <div class="row">
                                          <label for="" style="font-weight: 600;">
                                                Datos de la propiedad
                                          </label>
                                          <div class="col-lg-12">
                                                <fieldset>
                                                      <textarea name="txtDescripcion" id="txtDescripcion" placeholder="Descripción de la propiedad..."></textarea>
                                                </fieldset>
                                          </div>
                                          <div class="col-lg-12">
                                                <fieldset>
                                                      <input type="name" name="txtDireccion" id="txtDireccion" placeholder="Dirección..." autocomplete="on" required>
                                                </fieldset>
                                          </div>
                                          <div class="col-lg-12 ">
                                                <fieldset>
                                                      <select class="form-control" name="lstSucursal" id="lstSucursal">
                                                            <option value="" disabled selected>Sucursal...</option>
                                                            @foreach($aSucursales as $sucursal)
                                                            <option value="{{ $sucursal->nombre }}">{{ $sucursal->nombre }}</option>
                                                            @endforeach
                                                      </select>
                                                </fieldset>
                                          </div>
                                          <label for="" style="font-weight: 600;">
                                                Datos personales
                                          </label>
                                          <div class="col-lg-12">
                                                <fieldset>
                                                      <input type="name" name="txtNombre" id="txtNombre" placeholder="Nombre..." autocomplete="on" required>
                                                </fieldset>
                                          </div>
                                          <div class="col-lg-12">
                                                <fieldset>
                                                      <input type="subject" name="subject" id="subject" placeholder="Apellido..." autocomplete="on">
                                                </fieldset>
                                          </div>
                                          <div class="col-lg-12">
                                                <fieldset>
                                                      <input type="text" name="txtCorreo" id="txtCorreo" pattern="[^ @]*@[^ @]*" placeholder="correo..." required="">
                                                </fieldset>
                                          </div>
                                          <div class="col-lg-12">
                                                <fieldset>
                                                      <input type="text" name="txtTelefono" id="txtTelefono" pattern="[^ @]*@[^ @]*" placeholder="Teléfono..." required="">
                                                </fieldset>
                                          </div>
                                          <div class="col-lg-12">
                                                <fieldset>
                                                      <button type="submit" class="orange-button">ENVIAR</button>
                                                </fieldset>
                                          </div>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection