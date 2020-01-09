@extends('publica.layouts.master')

@section('title', $empresa->nombre)

@section('css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
@endsection

@section('contenido')

@include('publica.layouts.slider')

<section class="features ">
    <div class="container">
        <div class="row justify-content-center">
        	@if ($features->count() > 0)
        		@foreach ($features as $feature)
	                <div class="features-item col-12 col-md-3  justify-content-center align-items-center text-center">
                        <div class="col text-center features-img col-12">
                            <img src="{{asset('loaded/servicios/'.$feature->img[0]['nombre'])}}">
                        </div>
                            <h5 class="features-titulo">{{strtoupper($feature->titulo)}}</h5>
	                </div>
        		@endforeach   
        	@else
                <div class="col features-item col-12 col-md-6 col-lg-4">
                    <div class="row justify-content-center align-items-center">
                        <div class="col text-center features-img col-12 col-lg-4"><img src="{{asset('images/thumbnails/135x135.png')}}"></div>
                        <div class="col text-center text-lg-left col-12 col-md-8">
                            <h5 class="features-titulo">Titulo</h5>
                        </div>
                    </div>
                </div>
        	@endif
        </div>
    </div>
    <div class="w-100 recuadro-gris">
    </div>
    <div class="text-center p-5 mx-auto w-50 contenido-features" style="">
		<h4 >AMPLIA GAMA DE SERVICIOS DE MÁXIMA CALIDAD</h4>
		<p>En Ruca Asistencia creemos que la especialización es el factor fundamental de cualquier desarrollo, y por ello seguimos capacitando a nuestro personal en los procesos y la atención para poder brindarles el mejor servicio.
		</p>  		
    </div>
</section>

<section class="box-contenido">
    <div class="container">
	  	@if($contenido->count() > 0)
	      	@foreach ($contenido as $contenido)
		      	@if($loop->iteration  % 2 == 0)
			        <div class="row box-item">
			            <div class="col-12 col-md-6 texto-contenido">
			                <div class="subtexto-contenido px-2">{!! $contenido->texto1 !!}</div>
			            </div>
			            <div class="col-12 col-md-6 px-0"><img  src="{{asset('loaded/contenido/'.$contenido->img[0]['nombre'])}}" class="img-fluid px-0"></div>
			        </div>
			    @else
			    	<div class="row box-item">
			            <div class="col-12 col-md-6 px-0"><img  src="{{asset('loaded/contenido/'.$contenido->img[0]['nombre'])}}" class="img-fluid px-0"></div>
			            <div class="col-12 col-md-6 texto-contenido">
			                <div class="subtexto-contenido px-2">{!! $contenido->texto1 !!}</div>
			            </div>
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

<section class="clientes my-5">
    <div class="container text-center pt-5">
        <h4 class="mb-5">CLIENTES QUE CONFIAN EN NOSOTROS</h4>
        <div class="row justify-content-around">

        	@if ($clientes->count() > 0)
        		@foreach ($clientes as $cliente)
	                <div class="col-12 col-md-3  pb-4 justify-content-center shadow p-5">
                        <img class="img-fluid" src="{{asset('loaded/clientes/'.$cliente->img[0]['nombre'])}}">
	                </div>
        		@endforeach   
        	@else
        		<div class="col-12 col-md-3  pb-4 justify-content-center">
                    <img class="img-fluid" src="{{asset('images/thumbnails/425x295.png')}}">
                </div>
                <div class="col-12 col-md-3  pb-4 justify-content-center">
                    <img class="img-fluid" src="{{asset('images/thumbnails/425x295.png')}}">
                </div>
        	@endif
        </div>
    </div>
</section>

@endsection

@section('js')

@endsection