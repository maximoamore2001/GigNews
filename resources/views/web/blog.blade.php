@extends("web.plantilla")
@section("banner")


<div class="mt-5">
  <div class="container">
    <div class="col-12">
      <h1>Noticias</h1>
    </div>
    <div class="row mt-3">
    @foreach($aBlogs as $blog)
    <div class="col-8">
      <div class="row">
      <div class="col-12 card p-3">
        <h3> {{ $blog->titulo }} </h3>
        <p> {{ $blog->fecha }} </p>
        <img src="/files/{{ $blog->imagen }}" class="mb-2" alt="">
      </div>
      </div>
    </div>
    <div class="col-4">
      <div class="row">
      <div class="col-12" >
        <small> {{ $blog->fecha }} </small>
        <p>{{ $blog->titulo }} </p>
      </div>
      </div>
    </div>
    @endforeach
    </div>

  </div>
</div>




@endsection

@section("contenido")

@endsection