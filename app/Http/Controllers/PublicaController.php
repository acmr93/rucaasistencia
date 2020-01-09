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
        $features = Servicio::all();
        $contenido = Contenido::where('seccion',$seccion)->orderBy('orden')->get();
        $clientes = Cliente::orderBy('orden')->get();

        return view('publica.home',compact('seccion','metadato','slider','features','contenido','clientes'));
    }
}
