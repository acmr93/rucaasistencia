<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Familia extends Model
{
    use HasTranslations;
    protected $table = 'familias';
    protected $fillable = [
							'orden',
							'nombre',
                            'img',
							'slug',
						];
    public $translatable = ['nombre'];
    
    protected $casts = [
        'img' => 'array',
    ];
    
    public function subfamilias()
    {
        return $this->hasMany('App\Subfamilia','familia_id');
    }

    public function productos()
    {
        return $this->hasMany('App\Producto','familia_id');
    }
}
