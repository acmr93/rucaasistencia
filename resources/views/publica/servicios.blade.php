@extends('publica.layouts.master')

@section('title', $empresa->nombre.' | '.ucfirst($seccion))

@section('css')
    <link rel="stylesheet" href="{{asset('css/servicios.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
@endsection

@section('contenido')

@include('publica.layouts.slider')

<section class="features ">
    <div class="container">
        <div class="row">
        	@if ($features->count() > 0)
        		@foreach ($features as $feature)
	                <div class="features-item col-12 col-md-6 d-flex align-content-around">
                        <div class="row">
                            <div class="features-img col-12 col-md-8 ">
                                <img class="img-fluid" src="{{asset('loaded/servicios/'.$feature->img[0]['nombre'])}}">
                                <div class="pill-titulo">{{strtoupper($feature->titulo)}}</div>
                            </div>
                            <div class="features-text col-12 col-md-4 pr-0" >
                                @if ($feature->texto != null)
                                    <ul >
                                        @foreach ($feature->texto as $key => $value)
                                        <li class="mb-3">
                                            <spam style="color: #333333">{{$value['subservicio']}}</spam>
                                        </li>
                                        @endforeach                                     
                                    </ul>
                                @endif
                            </div>
                        </div>
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
</section>

@endsection

@section('js')

@endsection