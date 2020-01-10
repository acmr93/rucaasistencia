@extends('publica.layouts.master')

@section('title', $empresa->nombre.' | '.ucfirst($seccion))

@section('css')

@endsection

@section('contenido')

<section class="clientes my-5">
    <div class="container text-center py-5">
        <div class="row justify-content-around">

        	@if ($clientes->count() > 0)
        		@foreach ($clientes as $cliente)
	                <div class="col-12 col-md-4  pb-4 justify-content-center shadow p-5">
                        <a target="{{$cliente->url != null ?'_blank':''}}" href="{{$cliente->url != null ?$cliente->url:'#'}}">
                            <img class="img-fluid" src="{{asset('loaded/clientes/'.$cliente->img[0]['nombre'])}}">
                        </a>
	                </div>
        		@endforeach   
        	@else
        		<div class="col-12 col-md-4  pb-4 justify-content-center">
                    <img class="img-fluid" src="{{asset('images/thumbnails/425x295.png')}}">
                </div>
                <div class="col-12 col-md-4  pb-4 justify-content-center">
                    <img class="img-fluid" src="{{asset('images/thumbnails/425x295.png')}}">
                </div>
        	@endif
        </div>
    </div>
</section>

@endsection

@section('js')

@endsection