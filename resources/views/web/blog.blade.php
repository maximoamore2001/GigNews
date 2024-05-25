@extends("web.plantilla")
@section("banner")


<div class="properties mt-4" >
  <div class="container">
    @foreach($aBlogs as $blog)
        <div class="row mt-3">
          <div class="col-8">
            <div class="row">
              <div class="col-12 card py-3 px-5">
                <img src="public/files/{{ $blog->imagen }}" alt="">
                  <h1> {{ $blog->titulo }} </h1>
                  <p> {{ $blog->fecha }} </p>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="row">
              <div class="col-12 pt-3" style="font-size: 18px;">
                <small>{{ $blog->fecha }} |</small>
                <a href=""> {{ $blog->titulo }} </a>
              </div>
            </div>
          </div>
        </div>
    @endforeach
  </div>
</div>




@endsection

@section("contenido")

@endsection