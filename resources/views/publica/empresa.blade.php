@extends('publica.layouts.master')

@section('title', $empresa->nombre.' | '.ucfirst($seccion))

@section('css')
    <link rel="stylesheet" href="{{asset('css/empresa.css')}}">
@endsection

@section('contenido')

<div class="row align-items-end banner" style="background-image: url(&quot;{{asset('loaded/'.$seccion.'/'.$banner->nombre)}}&quot;); ">
    <div class="container ">
        <div class="text-center pb-5">
            {!!$banner->texto1!!}
        </div>
    </div>
</div>

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