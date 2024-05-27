@extends("web.plantilla")
@section("banner")

@php
  use Illuminate\Support\Str;
@endphp

<style>


  .blog-card {
    display: flex;
    flex-direction: column;
    margin: 1rem auto;
    box-shadow: 0 3px 7px -1px rgba(#000, .1);
    margin-bottom: 1.6%;
    background: #fff;
    line-height: 1.4;
    font-family: sans-serif;
    border-radius: 5px;
    overflow: hidden;
    z-index: 0;

    a {
      color: inherit;

      &:hover {
        color: #5ad67d;
      }
    }

    &:hover {
      .photo {
        transform: scale(1.5) rotate(3deg);
        opacity: .7;
      }
    }

    .meta {
      position: relative;
      z-index: 0;
      height: 200px;
    }

    .photo {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-size: cover;
      background-position: center;
      transition: transform .2s;
      width: 550px;
    }

    .details,
    .details ul {
      margin: auto;
      padding: 0;
      list-style: none;
    }

    .details {
      position: absolute;
      top: 0;
      bottom: 0;
      left: -100%;
      margin: auto;
      transition: left .2s;
      background: rgba(#000, .6);
      color: #fff;
      padding: 10px;
      width: 100%;
      font-size: .9rem;

      a {
        text-decoration: dotted underline
      }

      ul li {
        display: inline-block;
      }

      .author:before {
        font-family: FontAwesome;
        margin-right: 10px;
        content: "\f007";
      }

      .date:before {
        font-family: FontAwesome;
        margin-right: 10px;
        content: "\f133";
      }

      .tags {
        ul:before {
          font-family: FontAwesome;
          content: "\f02b";
          margin-right: 10px;
        }

        li {
          margin-right: 2px;

          &:first-child {
            margin-left: -4px;
          }
        }
      }
    }

    .description {
      padding: 1rem;
      background: #fff;
      position: relative;
      z-index: 1;

      h1,
      h2 {
        font-family: Poppins, sans-serif;
      }

      h2 {
        line-height: 1;
        margin: 0;
        font-size: 1.7rem;
      }


      .read-more {
        text-align: right;

        a {
          color: #5ad67d;
          display: inline-block;
          position: relative;

          &:after {
            content: "\f061";
            font-family: FontAwesome;
            margin-left: -10px;
            opacity: 0;
            vertical-align: middle;
            transition: margin .3s, opacity .3s;
          }

          &:hover:after {
            margin-left: 5px;
            opacity: 1;
          }
        }
      }
    }

    p {
      font-size: 1.2rem;
      position: relative;
      margin: 1rem 0 0;

      &:first-of-type {
        margin-top: 1.25rem;

        &:before {
          content: "";
          position: absolute;
          height: 5px;
          width: 35px;
          top: -0.75rem;
          border-radius: 3px;
        }
      }
    }

    &:hover {
      .details {
        left: 0%;
      }
    }


    @media (min-width: 640px) {
      flex-direction: row;
      max-width: 700px;

      .meta {
        flex-basis: 40%;
        height: auto;
      }

      .description {
        flex-basis: 60%;

        &:before {
          transform: skewX(-3deg);
          content: "";
          background: #fff;
          width: 30px;
          position: absolute;
          left: -10px;
          top: 0;
          bottom: 0;
          z-index: -1;
        }
      }

      &.alt {
        flex-direction: row-reverse;

        .description {
          &:before {
            left: inherit;
            right: -10px;
            transform: skew(3deg)
          }
        }

        .details {
          padding-left: 25px;
        }
      }
    }
  }
</style>
<div class="container-fluid pb-5 mt-5" style="background-color: #1e1e1e;">
  <div class="row pt-5" style="background-color: #1e1e1e;">
    @foreach($aBlogs as $blog)
    <div class="col-sm-6 col-12" style="background-color: #1e1e1e;">
    <div class="blog-card">
      <div class="meta">
      <img class="photo" src="/files/{{ $blog->imagen }}" alt="">
      <ul class="details">
        <li style="color: #1e1e1e; font-weight: 600; font-size: 1.3em;" class="date">{{ $blog->fecha }}</li>
      </ul>
      </div>
      <div class="description">
      <h2>{{ Str::limit($blog->titulo, 35) }}</h2>
      <p style="heigth: 168px;">{{ Str::limit($blog->descripcion, 140) }}</p>
      <p class="read-more">
        <a href="/noticia-detallada/{{ $blog->idblog }}">Ver más</a>
      </p>
      </div>
    </div>
    </div>
  @endforeach
  </div>
</div>





@endsection

@section("contenido")

@endsection