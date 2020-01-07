<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('adm')->middleware('auth')->group(function () {
	
	Route::get('/', function () {
	    return view('adm.index');
	})->name('adm');

	Route::get('usuarios/listar', ['as' =>'usuarios.listar' , 'uses' => 'UserController@listar']);
	Route::get('perfil', ['as' =>'perfil' , 'uses' => 'UserController@perfil']);
	Route::post('perfil', ['uses' => 'UserController@perfilUpdate','as' => 'perfil.update']);
	Route::resource('usuarios', 'UserController');

	Route::get('metadatos',['uses' => 'InfoController@metadatos',	'as' => 'info.metadatos']);
	Route::prefix('info')->group(function () {
		Route::get('{data}',	['uses' => 'InfoController@index',		'as' => 'info.empresa']);
		Route::put('general',	['uses' => 'InfoController@general',	'as' => 'info.general']);
		Route::put('emails',	['uses' => 'InfoController@emails',		'as' => 'info.emails']);
		Route::put('imagenes',	['uses' => 'InfoController@imagenes',	'as' => 'info.imagenes']);
		Route::put('redes',	['uses' => 'InfoController@redes',		'as' => 'info.redes']);
		Route::put('terminos',	['uses' => 'InfoController@terminos',	'as' => 'info.terminos']);
		Route::get('metadatos/{id}',['uses' => 'InfoController@showmetadato',	'as' => 'info.showmetadatos']);
		Route::put('metadatos/{id}',['uses' => 'InfoController@savemetadato',	'as' => 'info.savemetadatos']);
	});

	Route::prefix('home')->group(function () {
		Route::get('slider',['uses' => 'MultimediaController@SliderHome','as' => 'home.slider']);
		Route::get('slider/form/{id?}',['uses' => 'MultimediaController@SliderHomeID','as' => 'home.slider.id']);
		Route::get('banner',['uses' => 'MultimediaController@BannerHome','as' => 'home.banner']);
		Route::get('banner/form/{id?}',['uses' => 'MultimediaController@BannerHomeID','as' => 'home.banner.id']);
		Route::get('contenido',['uses' => 'ContenidoController@ContenidoHome','as' => 'home.contenido']);
		Route::get('contenido/form/{id?}',['uses' => 'ContenidoController@ContenidoHomeID','as' => 'home.contenido.id']);
	});


	Route::prefix('empresa')->group(function () {
		Route::get('slider',['uses' => 'MultimediaController@SliderEmpresa','as' => 'empresa.slider']);
		Route::get('slider/form/{id?}',['uses' => 'MultimediaController@SliderEmpresaID','as' => 'empresa.slider.id']);
		Route::get('banner',['uses' => 'MultimediaController@BannerEmpresa','as' => 'empresa.banner']);
		Route::get('banner/form/{id?}',['uses' => 'MultimediaController@BannerEmpresaID','as' => 'empresa.banner.id']);
		Route::get('contenido',['uses' => 'ContenidoController@ContenidoEmpresa','as' => 'empresa.contenido']);
		Route::get('contenido/form/{id?}',['uses' => 'ContenidoController@ContenidoEmpresaID','as' => 'empresa.contenido.id']);
	});

	Route::prefix('servicios')->group(function () {
		Route::get('slider',['uses' => 'MultimediaController@SliderServicios','as' => 'servicios.slider']);
		Route::get('slider/form/{id?}',['uses' => 'MultimediaController@SliderServiciosID','as' => 'servicios.slider.id']);
		Route::get('banner',['uses' => 'MultimediaController@BannerServicios','as' => 'servicios.banner']);
		Route::get('banner/form/{id?}',['uses' => 'MultimediaController@BannerServiciosID','as' => 'servicios.banner.id']);

		Route::get('',['uses' => 'ServiciosController@index','as' => 'servicios.index']);
		Route::get('form/{id?}',['uses' => 'ServiciosController@FormServiciosID','as' => 'servicios.form.id']);
		Route::post('',['uses' => 'ServiciosController@store','as' => 'servicios.store']);
		Route::delete('{id}',['uses' => 'ServiciosController@destroy','as' => 'servicios.destroy']);
	});

	Route::get('contenido_extra',['uses' => 'ContenidoController@ContenidoExtra','as' => 'extra.contenido']);
	Route::get('contenido_extra/form/{id?}',['uses' => 'ContenidoController@ContenidoExtraID','as' => 'extra.contenido.id']);

	Route::get('galeria',['uses' => 'MultimediaController@SliderGaleria','as' => 'galeria.slider']);
	Route::get('galeria/form/{id?}',['uses' => 'MultimediaController@SliderGaleriaID','as' => 'galeria.slider.id']);

	Route::post('file',['uses' => 'MultimediaController@store','as' => 'file.store']);
	Route::delete('file/{id}',['uses' => 'MultimediaController@destroy','as' => 'file.destroy']);

	Route::post('contenido',['uses' => 'ContenidoController@store','as' => 'contenido.store']);
	Route::delete('contenido/{id}',['uses' => 'ContenidoController@destroy','as' => 'contenido.destroy']);

	Route::get('clientes/listar', ['as' =>'clientes.listar' , 'uses' => 'ClientesController@listar']);
	Route::resource('clientes', 'ClientesController', ['except' => ['create', 'edit', 'update']]);
});


Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');
