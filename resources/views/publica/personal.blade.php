@extends('publica.layouts.master')

@section('title', $empresa->nombre.' | '.ucfirst($seccion))

@section('css')
 <style type="text/css">
     .box-contenido p{
        margin-bottom: 0px;
        color: #333333;
        font-size: 16px;
        font-weight: 500;
     }
 </style>
@endsection

@section('contenido')

<section class="box-contenido mt-5">
    <div class="container">
	  	@if($contenido->count() > 0)
	      	@foreach ($contenido as $contenido)
		      	<div class="row ">
                    <div class="col-12" style="">
                        {!! $contenido->texto1 !!}
                    </div>
                    <div class="col-12"><img  src="{{asset('loaded/contenido/'.$contenido->img[0]['nombre'])}}" class="img-fluid px-0"></div>
                </div>
	      	@endforeach
	   	@else
            <div class="row ">
                <div class="col-12">
                    TEXTO DE CONTENIDO
                </div>
                <div class="col-12"><img class="img-fluid px-0" src="{{asset('images/thumbnails/730x485.png')}}"></div>
            </div>
	  	@endif
    </div>
</section>


@endsection

@section('js')

@endsection