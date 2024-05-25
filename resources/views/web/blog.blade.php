@extends("web.plantilla")
@section("banner")


<div class="properties mt-4">
  <div class="container">
    <div class="col-12">
      <h1>Noticias</h1>
    </div>
    @foreach($aBlogs as $blog)
    <div class="row mt-3">
    <div class="col-8">
      <div class="row">
      <div class="col-12 card p-3">
        <img src="/files/{{ $blog->imagen }}" class="mb-2" alt="">
        <h3> {{ $blog->titulo }} </h3>
        <p> {{ $blog->fecha }} </p>
      </div>
      </div>
    </div>
  @endforeach

      <div class="col-4">
        <div class="row">
          <div class="col-12 pt-3" style="font-size: 18px;">
            <small>{{ $blog->fecha }} |</small>
            <a href=""> {{ $blog->titulo }} </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection

@section("contenido")

@endsection