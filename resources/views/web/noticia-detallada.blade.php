@extends("web.plantilla")
@section("banner")


@endsection
@section("contenido")



<div class="container">
      <div class="row mt-5">
            <div class="col-12 col-sm-6">
                  <img style="border: solid 4px #1e1e1e;" src="/files/{{ $blog->imagen }}" alt="">
            </div>
            <div class="col-sm-6 col-12 mt-2">
            <h2 class="py-2 pe-2" style="color: #42bc5a; text-decoration: underline #1e1e1e;">{{ $blog->titulo }}</h2>
            <p style="font-size: 19px; max-width: 600px; ">{{ $blog->descripcion }}</p>
            </div>
            
            <div class="col-12 mt-3">
            <h3 class="py-2">{{ $blog->segundo_titulo }}</h3>
            <p style="font-size: 19px; ">{{ $blog->segunda_descripcion }}</p>
            </div>

            <div class="col-12 mt-3">
            <h3 class="py-2">{{ $blog->segundo_titulo }}</h3>
            <p style="font-size: 19px; ">{{ $blog->segunda_descripcion }}</p>
            </div>
      </div>
</div>


@endsection