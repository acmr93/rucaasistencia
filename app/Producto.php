<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Producto extends Model
{
    use HasTranslations;
    
	protected $table = 'productos';
    protected $fillable = [
							'orden',
							'nombre',
							'descripcion',
							'caracteristicas',
							'texto1',
							'texto2',
							'img',
							'familia_id',
							'subfamilia_id',
                            'slug'
						];
	
    //Esto declara el campo json en un Array al imprimir en la vista
	protected $casts = [
        'img' => 'array',
    ];
    
    public $translatable = ['titulo', 'subtitulo', 'descripcion', 'caracteristicas', 'ventajas', 'codigos'];

	public function familia()
    {
    	return $this->belongsTo('App\Familia','familia_id');
    }

    public function subfamilia()
    {
    	return $this->belongsTo('App\Subfamilia','subfamilia_id');
    }
}
