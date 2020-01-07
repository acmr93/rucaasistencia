@extends('adm.layouts.master')

@section('title', $empresa->nombre.'| '.ucfirst($seccion).' - Contenido')

@section('css')
	<!-- summernote -->
	<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">

	<style type="text/css">
	    .control {
	        max-width:100%;
	        max-height: 150px;
	    }
	 </style>
@endsection

@section('contenido')

<div class="row">
		<div class="col-md-12">
		  <!-- general form elements -->
		  <div class="card card-primary">
		    <div class="card-header">
		      	<h3 class="card-title">Contenido en {{ucfirst($seccion)}}</h3>	    	
		    </div>
		    <!-- /.card-header -->
		    <!-- form start -->
		    <div class="card-body">
		    	{!! Form::open(['method' => 'POST', 'route' => 'contenido.store', 'class' => 'form-horizontal', 'files' => true,'enctype'=>"multipart/form-data"]) !!}

	    		{!! Form::hidden('seccion', (isset($contenido)?$contenido->seccion:$seccion)) !!}
		    	{!! Form::hidden('id', (isset($contenido)?$contenido->id:null)) !!}

		    	<div class="row">
		    		
		    		<div class="col-md-6 col-sm-12">
			    		<div class="form-group{{ $errors->has('orden') ? ' has-error' : '' }}">
				    	    {!! Form::label('text', 'Orden:') !!}
				    	    {!! Form::text('orden',  (isset($contenido)?$contenido->orden:null), ['class' => 'form-control', 'required' => 'required']) !!}
				    	    <small class="text-danger">{{ $errors->first('orden') }}</small>
				    	</div>
						@foreach (LaravelLocalization::getLocalesOrder() as $key => $lang)
			          	<div class="form-group{{ $errors->has('titulo[$key]') ? ' has-error' : '' }}">
				    	    {!! Form::label('titulo['.$key.']', 'Titulo:') !!}
				    	    {!! Form::text('titulo['.$key.']', (isset($contenido) ? $contenido->getTranslation('titulo', $key) : null) , ['class' => 'form-control']) !!}
				    	    <small class="text-danger">{{ $errors->first('titulo['.$key.']') }}</small>
				    	</div>
						<div class="form-group{{ $errors->has('texto1[$key]') ? ' has-error' : '' }}">
				    	    {!! Form::label('texto1['.$key.']', 'Texto:') !!}
				    	    {!! Form::textarea('texto1['.$key.']', (isset($contenido) ? $contenido->getTranslation('texto1', $key) : null) , ['class' => 'form-control textarea', 'rows' => 2]) !!}
				    	    <small class="text-danger">{{ $errors->first('texto1['.$key.']') }} </small>
				    	</div>
				        @endforeach
		    		</div>
		    		<div class="col-md-6 col-sm-12">
				    	<div class="form-group">
		                    <label for="exampleInputFile" class="{{$errors->has('archivo') ? 'text-danger' : ''}}">Imagen para el Contenido</label>
		                    <div class="input-group">
		                      <div class="custom-file">
		                        <input type="file" class="custom-file-input {{$errors->has('archivo') ? 'is-invalid' : ''}}" id="exampleInputFile" name="archivo[]" {{(isset($contenido)?'':'required')}}>
		                        <label class="custom-file-label" for="exampleInputFile">{{(isset($contenido)?$contenido->url_img:'Seleccione imagen')}}</label>
		                      </div>
		                    </div>
		                </div>	
		                <small class="text-danger">{{ $errors->first('archivo') }}</small>

	                	@if(isset($contenido) && $contenido->img != null)
							@foreach ($contenido->img as $key => $value)
								<img id="imagen" src="{{asset('loaded/contenido/'.$value['nombre'])}}" class="control">
							@endforeach
						@else
							<img id="imagen" src="{{asset('images/thumbnails/1128x898.png')}}" class="control" alt="Responsive image">
						@endif
		                		    		
		    		</div>
		    	</div>
			</div>
		    <!-- /.card-body -->>
		  </div>
		  <!-- /.card -->			
		</div>
	</div>
<!-- /.row -->
<button type="submit" class="btn btn-success flotante"><i class="fas fa-save"></i></button>
{!! Form::close() !!}
@endsection

@section('js') 

<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/summernote/lang/summernote-es-ES.min.js')}}"></script>

<script type="text/javascript">

// Summernote
$('.textarea').summernote({
	lang: 'es-ES',
	colors: [
        ['white', 'black','red', 'green', 'blue'], //first line of colors
        ['#1D3278', '#2AB0E1', '#3E3F44', '#505050'] //second line of colors
    ],
	  toolbar: [
	    // [groupName, [list of button]]
	    ['style', ['bold', 'italic', 'underline', 'clear']],
	    ['font', ['strikethrough', 'superscript', 'subscript']],
	    ['color', ['forecolor']],
	    ['para', ['ul', 'ol', 'paragraph']],
	    ['insert', ['link', 'table', 'hr']],
	  ]
})

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#imagen').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#exampleInputFile").change(function() {
  readURL(this);
});

</script>

@endsection

