@extends('publica.layouts.master')

@section('title', $empresa->nombre.' | '.ucfirst($seccion))

@section('css')
    <link rel="stylesheet" href="{{asset('css/empresa.css')}}">
    <style type="text/css">
        .video {
          position: relative;
          background-color: black;
          height: 75vh;
          min-height: 550px;
          width: 100%;
          overflow: hidden;
        }

        .video video {
          position: absolute;
          top: 50%;
          left: 50%;
          min-width: 100%;
          min-height: 100%;
          width: auto;
          height: auto;
          z-index: 0;
          -ms-transform: translateX(-50%) translateY(-50%);
          -moz-transform: translateX(-50%) translateY(-50%);
          -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);
        }

        .video .container {
          position: relative;
          z-index: 2;
        }

        @media (pointer: coarse) and (hover: none) {
          .video {
            background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
          }
          .video video {
            display: none;
          }
        }
    </style>
@endsection

@section('contenido')

<section class="video">
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    @if ($banner->count() > 0)
        <source src="{{asset('loaded/'.$seccion.'/'.$banner->nombre)}}" type="video/mp4">
    @endif
  </video>
</section>

<section class="box-contenido">
    <div class="container">
	  	@if($contenido->count() > 0)
	      	@foreach ($contenido as $contenido)
		      	@if($loop->iteration  % 2 == 0)
                    <div class="row box-item">
                        <div class="col-12 col-md-6 px-0"><img  src="{{asset('loaded/contenido/'.$contenido->img[0]['nombre'])}}" class="img-fluid px-0"></div>
                        <div class="col-12 col-md-6 texto-contenido">
                            <div class="subtexto-contenido px-2">{!! $contenido->texto1 !!}</div>
                        </div>
                    </div>
			    @else
			    	<div class="row box-item">
                        <div class="col-12 col-md-6 texto-contenido">
                            <div class="subtexto-contenido px-2">{!! $contenido->texto1 !!}</div>
                        </div>
                        <div class="col-12 col-md-6 px-0"><img  src="{{asset('loaded/contenido/'.$contenido->img[0]['nombre'])}}" class="img-fluid px-0"></div>
                    </div>
			    @endif
	      	@endforeach
	   	@else
            <div class="row box-item">
                <div class="col-12 col-md-6">
                    <h2 class="box-contenido-titulo">Titulo de contenido</h2>
                    <p>Texto de contenido</p>
                </div>
                <div class="col-12 col-md-6 px-0"><img class="img-fluid px-0" src="{{asset('images/thumbnails/730x485.png')}}"></div>
            </div>
	  	@endif
    </div>
</section>


@endsection

@section('js')

@endsection