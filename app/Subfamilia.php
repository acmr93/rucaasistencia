<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subfamilia extends Model
{
    use HasTranslations;
    protected $table = 'subfamilias';
    protected $fillable = [
							'orden',
							'nombre',
                            'img',
							'slug',
							'familia_id',
						];
    public $translatable = ['nombre'];

    protected $casts = [
        'img' => 'array',
    ];
    
    public function familia()
    {
        return $this->belongsTo('App\Familia','familia_id');
    }
    public function productos()
    {
        return $this->hasMany('App\Producto','subfamilia_id');
    }
}
