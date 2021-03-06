<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Categoria extends Model
{	
	use HasTranslations;
    
    protected $table = 'categorias';
    protected $fillable = [
							'orden',
							'nombre',
							'img',
                            'slug'
						];

    public $translatable = ['nombre'];

    protected $casts = [
        'img' => 'array',
    ];
}
