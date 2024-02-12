@extends("web.plantilla")
@section("banner")

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <span class="breadcrumb"><a href="/">Inicio</a> / Nosotros</span>
        <h3>Nosotros</h3>
      </div>
    </div>
  </div>
</div>
@endsection
@section("contenido")
<div class="featured section py-5">
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
            <h6>| Acerca de</h6>
            <h2>Expertos en asesoramiento inmobiliario</h2>
          </div>
          <div class="px-3">
            <p class="text__description">Terranova Inmobiliaria es una reconocida empresa del rubro inmobiliario en Rosario. <br> Especializada en la venta y alquiler de propiedades residenciales y comerciales, Terranova se destaca por ofrecer un servicio integral y personalizado a sus clientes.<br> Con una amplia experiencia en el mercado y un equipo de profesionales altamente capacitados, esta inmobiliaria se ha ganado la confianza de quienes buscan comprar, vender o alquilar propiedades en la ciudad. Además de su sólida reputación, Terranova se distingue por su compromiso con la excelencia y la satisfacción del cliente, brindando asesoramiento experto en cada paso del proceso inmobiliario.<br> Si buscas una empresa confiable y comprometida para tus necesidades inmobiliarias en Rosario, Terranova es una excelente opción.</p>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <div class="video section">
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

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Edificios<br>Terminados</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Años<br>de experiencia</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Premios<br> 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection