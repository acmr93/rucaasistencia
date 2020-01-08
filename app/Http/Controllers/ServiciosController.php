<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use Laracasts\Flash\Flash;
use File;

class ServiciosController extends Controller
{
	public function index()
    {   
        $servicios = Servicio::all();
        return view('adm.servicios.index',compact('servicios'));
    }

    public function FormServiciosID($id = null)
    {   
        $servicio = Servicio::find($id);
        //dd($servicio);
        return view('adm.servicios.form')->with('servicio',$servicio);
    }

    public function store(Request $request)
    {	
        if (isset($request->id)) {

            $this->validate($request, 
            [
                "archivo"  => "nullable",
                "archivo.*"  => "nullable|mimes:jpeg,png",
            ]);

            $servicio = Servicio::findOrFail($request->id);
            $servicio->fill($request->all());
            $servicio->save();

            if ($request->hasfile('archivo')){
                if ($servicio->img != null) {
                	foreach ($servicio->img as $key => $value) {
                		$filename= $value['nombre'];
                    	$file = public_path().'/loaded/servicios/'.$filename;
                    	File::delete($file);
                	}
                }
                foreach ($request->archivo as $archivo) {
                    $nombre_original = $archivo->getClientOriginalName();
                    $extension = pathinfo($nombre_original, PATHINFO_EXTENSION); // jpg
                    $nombre_interno= time().'.'.$extension;
                    $path_file = public_path().'/loaded/servicios/';
                    $archivo->move($path_file,$nombre_interno);
                    $imagenes[] =   [
                                        "url" => 'public/loaded/servicios/',
                                        "nombre" => $nombre_interno,
                                        "extension" => $extension,
                                    ];
                }
                $servicio->img = $imagenes;
                $servicio->save();
            }

            $i=0;


            if ($request->id_sub){
				$actual_texto = $servicio->texto;

				//para modificar
				foreach ($request->id_sub as $id_sub => $value1) {
					foreach ($actual_texto as $key => $value) {
						if ($value1 == $value['id']) {
							$i++;
							$sub_ser = $value['subservicio'];
		                	if (!empty($request->sub_servicio[$id_sub]))
		                		$sub_ser = $request->sub_servicio[$id_sub];

				            $mod_text[] =   [
                                        "id" => $i,
                                        "subservicio" => $sub_ser,
                                    ];
				        }
					}
				}

				$servicio->texto = $mod_text;
                $servicio->save();     			
            }

            if ($request->sub_new){
                foreach ($request->sub_new as $subservicio => $value) {
                	$i++;
                    $texto[] =   [
                                        "id" => $i,
                                        "subservicio" => $value,
                                    ];
                }
                $servicio->texto = array_merge($servicio->texto,$texto);
                $servicio->save();
            }

            Flash::success("Se ha actualizado el servicio!!");          
        }

        else{
            $this->validate($request, 
            [
                "archivo"    => "required",
                "archivo.*"  => "required|mimes:jpeg,png",
            ]);

            $servicio= new Servicio($request->all());
            $servicio->save();

            if ($request->hasfile('archivo')){
                foreach ($request->archivo as $archivo) {
                    $nombre_original = $archivo->getClientOriginalName();
                    $extension = pathinfo($nombre_original, PATHINFO_EXTENSION); // jpg
                    $nombre_interno= time().'.'.$extension;
                    $path_file = public_path().'/loaded/servicios/';
                    $archivo->move($path_file,$nombre_interno);
                    $imagenes[] =   [
                                        "url" => 'public/loaded/servicios/',
                                        "nombre" => $nombre_interno,
                                        "extension" => $extension,
                                    ];
                }
                $servicio->img = $imagenes;
                $servicio->save();
            }

            if ($request->sub_new){
            	$i=0;
                foreach ($request->sub_new as $subservicio => $value) {
                	$i++;
                    $texto[] =   [
                                        "id" => $i,
                                        "subservicio" => $value,
                                    ];
                }
                $servicio->texto = $texto;
                $servicio->save();
            }


            Flash::success("Se ha creado el servicio!!");         
        }

        return redirect()->route('servicios.index');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        if ($servicio->img != null) {
        	foreach ($servicio->img as $key => $value) {
        		$filename= $value['nombre'];
            	$file = public_path().'/loaded/servicios/'.$filename;
            	File::delete($file);
        	}
        }

        $servicio->delete();

        Flash::error("Se ha eliminado el servicio!!");         
        return redirect()->route('servicios.index');
    }
}
