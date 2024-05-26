@extends("web.plantilla")
@section("banner")


@endsection
@section("contenido")



<div class="container">
      <div class="row mt-5 p-5">
            <div class="col-12 col-sm-5">
                  <img src="/files/{{ $blog->imagen }}" alt="">
            </div>
            <div class="col-sm-7 col-12 mt-2">
            <h2 class="py-2">{{ $blog->titulo }}</h2>
            <p style="font-size: 19px; max-width: 600px; ">{{ $blog->descripcion }}</p>
            </div>
            
            <div class="col-12 mt-3">
            <h2 class="py-2">{{ $blog->segundo_titulo }}</h2>
            <p style="font-size: 19px; ">{{ $blog->segunda_descripcion }}</p>
            </div>

            <div class="col-12 mt-3">
            <h2 class="py-2">{{ $blog->segundo_titulo }}</h2>
            <p style="font-size: 19px; ">{{ $blog->segunda_descripcion }}</p>
            </div>
      </div>
</div>


@endsection