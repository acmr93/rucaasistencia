<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadato;
use App\Multimedia;
use App\Servicio;
use App\Cliente;
use App\Contenido;

class PublicaController extends Controller
{
    public function home(){
    	$seccion = 'home';
        $metadato = Metadato::where('seccion', $seccion)->first();
		$slider = Multimedia::where([['seccion', $seccion],['tipo', 'slider']])->orderBy('orden')->get();
        $features = Servicio::orderBy('orden')->get();
        $contenido = Contenido::where('seccion',$seccion)->orderBy('orden')->get();
        $clientes = Cliente::orderBy('orden')->get();

        return view('publica.home',compact('seccion','metadato','slider','features','contenido','clientes'));
    }

    public function empresa(){
    	$seccion = 'empresa';
        $metadato = Metadato::where('seccion', $seccion)->first();
		$banner = Multimedia::where([['seccion', $seccion],['tipo', 'banner']])->latest()->first();;
        $contenido = Contenido::where('seccion',$seccion)->orderBy('orden')->get();

        return view('publica.empresa',compact('seccion','metadato','banner','contenido'));
    }

    public function servicios(){
    	$seccion = 'servicios';
        $metadato = Metadato::where('seccion', $seccion)->first();
		$slider = Multimedia::where([['seccion', $seccion],['tipo', 'slider']])->orderBy('orden')->get();
		$features = Servicio::orderBy('orden')->get();

        return view('publica.servicios',compact('seccion','metadato','slider','features'));
    }
}
